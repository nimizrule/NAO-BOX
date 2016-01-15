00001 #!/usr/bin/env python
00002 
00003 # This script collects diagnostic information on a Nao robot and publishes
00004 # the information as DiagnosticArray messages.
00005 #
00006 # This script was written and tested with NaoQI 1.10.52 and will probably
00007 # fail on 1.12+ as some ALMemory keys and device paths have changed.
00008 #
00009 # You can run this script either on the robot or on a remote machine,
00010 # however, CPU temperature and network status will only be available if the
00011 # script runs directly on the robot.
00012 #
00013 
00014 # Copyright 2011-2012 Stefan Osswald, University of Freiburg
00015 #
00016 # Redistribution and use in source and binary forms, with or without
00017 # modification, are permitted provided that the following conditions are met:
00018 #
00019 #    # Redistributions of source code must retain the above copyright
00020 #       notice, this list of conditions and the following disclaimer.
00021 #    # Redistributions in binary form must reproduce the above copyright
00022 #       notice, this list of conditions and the following disclaimer in the
00023 #       documentation and/or other materials provided with the distribution.
00024 #    # Neither the name of the University of Freiburg nor the names of its
00025 #       contributors may be used to endorse or promote products derived from
00026 #       this software without specific prior written permission.
00027 #
00028 # THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
00029 # AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
00030 # IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
00031 # ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
00032 # LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
00033 # CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
00034 # SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
00035 # INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
00036 # CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
00037 # ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
00038 # POSSIBILITY OF SUCH DAMAGE.
00039 #
00040 
00041 
00042 import rospy
00043 
00044 import dbus
00045 from dbus.exceptions import DBusException
00046 
00047 from nao_driver import NaoNode
00048 import os
00049 
00050 from diagnostic_msgs.msg import *
00051 
00052 class NaoDiagnosticUpdater(NaoNode):
00053     def __init__(self):
00054         NaoNode.__init__(self, 'nao_diagnostic_updater')
00055 
00056         # ROS initialization:
00057         self.connectNaoQi()
00058 
00059         # Read parameters:
00060         self.sleep = 1.0/rospy.get_param('~update_rate', 0.5)  # update rate in Hz
00061         self.warningThreshold = rospy.get_param('~warning_threshold', 68) # warning threshold for joint temperatures
00062         self.errorThreshold = rospy.get_param('~error_threshold', 74)     # error threshold for joint temperatures
00063         # check if NAOqi runs on the robot by checking whether the OS has aldebaran in its name
00064         self.runsOnRobot = "aldebaran" in os.uname()[2]   # if temperature device files cannot be opened, this flag will be set to False later.
00065 
00066         # Lists with interesting ALMemory keys
00067         self.jointNamesList = self.motionProxy.getJointNames('Body')    
00068         self.jointTempPathsList = []
00069         self.jointStiffPathsList = []    
00070         for i in range(0, len(self.jointNamesList)):
00071             self.jointTempPathsList.append("Device/SubDeviceList/%s/Temperature/Sensor/Value" % self.jointNamesList[i])
00072             self.jointStiffPathsList.append("Device/SubDeviceList/%s/Hardness/Actuator/Value" % self.jointNamesList[i])
00073 
00074         self.batteryNamesList = ["Percentage", "Status"]
00075         self.batteryPathsList = ["Device/SubDeviceList/Battery/Charge/Sensor/Value", 
00076                                  "Device/SubDeviceList/Battery/Charge/Sensor/Status",
00077                                  "Device/SubDeviceList/Battery/Current/Sensor/Value"]
00078         
00079         self.deviceInfoList = ["Device/DeviceList/ChestBoard/BodyId"]
00080         deviceInfoData = self.memProxy.getListData(self.deviceInfoList)
00081         if(len(deviceInfoData) > 1 and isinstance(deviceInfoData[1], list)):
00082             deviceInfoData = deviceInfoData[1]
00083         if(deviceInfoData[0] is None or deviceInfoData[0] == 0):
00084             # No device info -> running in a simulation
00085             self.isSimulator = True
00086             if(self.pip.startswith("127.") or self.pip == "localhost"):
00087                 # Replace localhost with hostname of the machine
00088                 f = open("/etc/hostname")
00089                 self.hardwareID = "%s:%d"%(f.readline().rstrip(), self.pport)
00090                 f.close()
00091             else:
00092                 self.hardwareID = "%s:%d"%(self.pip, self.pport)            
00093         else:
00094             self.hardwareID = deviceInfoData[0].rstrip()
00095             self.isSimulator = False
00096             
00097         # init. messages:        
00098         self.diagnosticPub = rospy.Publisher("diagnostics", DiagnosticArray, queue_size=10)
00099 
00100         rospy.loginfo("nao_diagnostic_updater initialized")
00101 
00102     # (re-) connect to NaoQI:
00103     def connectNaoQi(self):
00104         """ Connects to NaoQi and gets proxies to ALMotion and ALMemory. """
00105         rospy.loginfo("Connecting to NaoQi at %s:%d", self.pip, self.pport)
00106         self.motionProxy = self.get_proxy("ALMotion")
00107         self.memProxy = self.get_proxy("ALMemory")
00108         if self.motionProxy is None or self.memProxy is None:
00109             exit(1)
00110 
00111     def run(self):
00112         """ Diagnostic thread code - collects and sends out diagnostic data. """
00113         while self.is_looping():
00114             try:
00115                 # Get data from robot
00116                 jointsTempData = self.memProxy.getListData(self.jointTempPathsList)
00117                 jointsStiffData = self.memProxy.getListData(self.jointStiffPathsList)
00118                 batteryData = self.memProxy.getListData(self.batteryPathsList)
00119                 if isinstance(jointsTempData[1], list):
00120                     # Some naoqi versions provide data in [0, [data1, data2, ...], timestamp] format,
00121                     # others just as [data1, data2, ...]
00122                     # --> get data list                    
00123                     jointsTempData = jointsTempData[1]
00124                     jointsStiffData = jointsStiffData[1]
00125                     batteryData = batteryData[1]
00126             except RuntimeError,e:
00127                 print "Error accessing ALMemory, exiting...\n"
00128                 print e
00129                 rospy.signal_shutdown("No NaoQI available anymore")
00130 
00131             diagnosticArray = DiagnosticArray()
00132             
00133             # Process joint temperature and stiffness
00134             for i in range(0, len(self.jointTempPathsList)):
00135                 status = DiagnosticStatus()
00136                 status.hardware_id = "%s#%s"%(self.hardwareID, self.jointNamesList[i])           
00137                 status.name = "nao_joint: %s" % self.jointNamesList[i]                
00138                 kv = KeyValue()
00139                 kv.key = "Temperature"
00140                 temperature = jointsTempData[i]
00141                 kv.value = str(temperature)
00142                 status.values.append(kv)
00143                 kv = KeyValue()
00144                 kv.key = "Stiffness"
00145                 if self.jointNamesList[i] == "RHipYawPitch":
00146                     # same joint as LHipYawPitch, does not provide data
00147                     kv.value = "None"
00148                 else:
00149                     kv.value = str(jointsStiffData[i])
00150                 status.values.append(kv)
00151                 if (type(temperature) != float and type(temperature) != int) or self.jointNamesList[i] == "RHipYawPitch":
00152                     status.level = DiagnosticStatus.OK
00153                     status.message = "No temperature sensor"
00154                 elif temperature < self.warningThreshold:
00155                     status.level = DiagnosticStatus.OK
00156                     status.message = "Normal: %3.1f C" % temperature
00157                 elif temperature < self.errorThreshold:
00158                     status.level = DiagnosticStatus.WARN
00159                     status.message = "Hot: %3.1f C" % temperature
00160                 else:
00161                     status.level = DiagnosticStatus.ERROR
00162                     status.message = "Too hot: %3.1f C" % temperature
00163                 diagnosticArray.status.append(status)
00164 
00165             # Process battery status flags
00166             status = DiagnosticStatus()
00167             status.hardware_id = "%s#%s"%(self.hardwareID, "battery")
00168             status.name ="nao_power: Battery"
00169             kv = KeyValue()
00170             kv.key = "Percentage"
00171             if batteryData[0] is None:
00172                 kv.value = "unknown"
00173             else:
00174                 kv.value = str(batteryData[0] * 100)
00175             status.values.append(kv)
00176 
00177             # Battery status: See http://www.aldebaran-robotics.com/documentation/naoqi/sensors/dcm/pref_file_architecture.html?highlight=discharge#charge-for-the-battery
00178             # Note: SANYO batteries use different keys!
00179             statuskeys = ["End off Discharge flag", "Near End Off Discharge flag", "Charge FET on", "Discharge FET on", "Accu learn flag", "Discharging flag", "Full Charge Flag", "Charge Flag", "Charge Temperature Alarm", "Over Charge Alarm", "Discharge Alarm", "Charge Over Current Alarm", "Discharge Over Current Alarm (14A)", "Discharge Over Current Alarm (6A)", "Discharge Temperature Alarm", "Power-Supply present" ]
00180                         
00181             for j in range(0, 16):
00182                 kv = KeyValue()
00183                 kv.key = statuskeys[j]
00184                 if batteryData[1] is None:
00185                     kv.value = "unknown"
00186                 elif int(batteryData[1]) & 1<<j:
00187                     kv.value = "True"
00188                 else:
00189                     kv.value = "False"
00190                 status.values.append(kv)
00191                 
00192             kv = KeyValue()
00193             kv.key = "Status"
00194             if batteryData[1] is None:
00195                 kv.value = "unknown"
00196             else:
00197                 kv.value = bin(int(batteryData[1]))
00198             status.values.append(kv)
00199 
00200             # Process battery charge level
00201             if batteryData[0] is None:
00202                 status.level = DiagnosticStatus.OK
00203                 status.message = "Battery status unknown, assuming simulation"
00204             elif int(batteryData[1]) & 1<<6:
00205                 status.level = DiagnosticStatus.OK
00206                 status.message = "Battery fully charged"
00207             elif int(batteryData[1]) & 1<<7:
00208                 status.level = DiagnosticStatus.OK
00209                 status.message = "Charging (%3.1f%%)" % (batteryData[0] * 100)
00210             elif batteryData[0] > 0.60:
00211                 status.level = DiagnosticStatus.OK
00212                 status.message = "Battery OK (%3.1f%% left)" % (batteryData[0] * 100)
00213             elif batteryData[0] > 0.30:
00214                 status.level = DiagnosticStatus.WARN
00215                 status.message = "Battery discharging (%3.1f%% left)" % (batteryData[0] * 100)
00216             else:
00217                 status.level = DiagnosticStatus.ERROR
00218                 status.message = "Battery almost empty (%3.1f%% left)" % (batteryData[0] * 100)
00219             diagnosticArray.status.append(status)
00220             
00221 
00222             # Process battery current
00223             status = DiagnosticStatus()
00224             status.hardware_id = "%s#%s"%(self.hardwareID, "power")
00225             status.name = "nao_power: Current"
00226              
00227             if batteryData[2] is None:
00228                 status.level = DiagnosticStatus.OK
00229                 status.message = "Total Current: unknown"
00230             else:
00231                 kv = KeyValue()
00232                 kv.key = "Current"
00233                 kv.value = str(batteryData[2])
00234                 status.values.append(kv)
00235                 status.level = DiagnosticStatus.OK
00236                 if batteryData[2] > 0:
00237                     currentStatus = "charging"
00238                 else:
00239                     currentStatus = "discharging"
00240                 status.message = "Total Current: %3.2f Ampere (%s)" % (batteryData[2], currentStatus)
00241             diagnosticArray.status.append(status)
00242 
00243             # Process CPU and head temperature
00244             status = DiagnosticStatus()
00245             status.hardware_id = "%s#%s"%(self.hardwareID, "cpu")
00246             status.name = "nao_cpu: Head Temperature"
00247             temp = self.temp_get()
00248             kv = KeyValue()
00249             kv.key = "CPU Temperature"
00250             kv.value = str(temp['HeadSilicium'])
00251             status.values.append(kv)
00252             kv = KeyValue()
00253             kv.key = "Board Temperature"
00254             kv.value = str(temp['HeadBoard'])            
00255             status.values.append(kv)
00256             if(temp['HeadSilicium'] == "invalid"):
00257                 status.level = DiagnosticStatus.OK
00258                 status.message = "unknown, assuming simulation"
00259             else:
00260                 status.message = "%3.2f deg C" % (temp['HeadSilicium'])
00261                 if temp['HeadSilicium'] < 100:
00262                     status.level = DiagnosticStatus.OK
00263                 elif temp['HeadSilicium'] < 105:
00264                     status.level = DiagnosticStatus.WARN
00265                 else:
00266                     status.level = DiagnosticStatus.ERROR                    
00267             diagnosticArray.status.append(status)            
00268             
00269             
00270             # Process WIFI and LAN status
00271             statusWifi = DiagnosticStatus()
00272             statusWifi.hardware_id = "%s#%s"%(self.hardwareID, "wlan")
00273             statusWifi.name = "nao_wlan: Status"
00274             
00275             statusLan = DiagnosticStatus()
00276             statusLan.hardware_id = "%s#%s"%(self.hardwareID, "ethernet")
00277             statusLan.name = "nao_ethernet: Status"
00278             
00279             if self.runsOnRobot:
00280                 statusLan.level = DiagnosticStatus.ERROR
00281                 statusLan.message = "offline"
00282                 statusWifi.level = DiagnosticStatus.ERROR
00283                 statusWifi.message = "offline"                              
00284                 systemBus = dbus.SystemBus()
00285                 try:
00286                     manager = dbus.Interface(systemBus.get_object("org.moblin.connman", "/"), "org.moblin.connman.Manager")
00287                 except DBusException as e:
00288                     self.runsOnRobot = False
00289                 if self.runsOnRobot:
00290                     properties = manager.GetProperties()
00291                     for property in properties["Services"]:
00292                         service = dbus.Interface(systemBus.get_object("org.moblin.connman", property), "org.moblin.connman.Service")
00293                         try:
00294                             props = service.GetProperties()
00295                         except DBusException as e:
00296                             continue # WLAN network probably disappeared meanwhile
00297                         
00298                         state = str(props.get("State", "None"))
00299                         if state == "idle":
00300                             pass # other network, not connected 
00301                         else:                 
00302                             nettype = str(props.get("Type", "<unknown>"))
00303                             if(nettype == "wifi"):
00304                                 status = statusWifi
00305                             else:
00306                                 status = statusLan   
00307                             kv = KeyValue()
00308                             kv.key = "Network"
00309                             kv.value = str(props.get("Name", "<unknown>"))                    
00310                             status.values.append(kv)
00311                             if nettype == "wifi":
00312                                 strength = int(props.get("Strength", "<unknown>"))
00313                                 kv = KeyValue()
00314                                 kv.key = "Strength"
00315                                 kv.value = "%d%%"%strength
00316                                 status.values.append(kv)
00317                             else:
00318                                 strength = None                    
00319                             kv = KeyValue()
00320                             kv.key = "Type"
00321                             kv.value = nettype
00322                             status.values.append(kv)
00323                             if strength is None:
00324                                 status.message = state
00325                             else:
00326                                 status.message = "%s (%d%%)"%(state, strength)
00327                                 
00328                             if state in ["online", "ready"]:
00329                                 status.level = DiagnosticStatus.OK
00330                             elif state in ["configuration", "association"]:
00331                                 status.level = DiagnosticStatus.WARN
00332                             else: # can only be 'failure'
00333                                 status.message = str("%s (%s)"%(state, props.get("Error")))
00334                                 status.level = DiagnosticStatus.ERROR
00335             else:
00336                 statusWifi.level = DiagnosticStatus.OK
00337                 statusWifi.message = "nao_diagnostic_updater not running on robot, cannot determine WLAN status"
00338                                 
00339                 statusLan.level = DiagnosticStatus.OK
00340                 statusLan.message = "nao_diagnostic_updater not running on robot, cannot determine Ethernet status"
00341                                         
00342             diagnosticArray.status.append(statusWifi)   
00343             diagnosticArray.status.append(statusLan)   
00344             
00345             # Publish all diagnostic messages
00346             diagnosticArray.header.stamp = rospy.Time.now()                                  
00347             self.diagnosticPub.publish(diagnosticArray)                             
00348             rospy.sleep(self.sleep)
00349             
00350     def temp_get(self):
00351         """Read the CPU and head temperature from the system devices.
00352 
00353         Returns {'HeadSilicium': <temperature>, 'HeadBoard': <temperature>}
00354 
00355         Temperatures are returned as float values in degrees Celsius, or
00356         as the string 'invalid' if the sensors are not accessible.
00357         """
00358         temp = {'HeadSilicium': 'invalid', 'HeadBoard': 'invalid'}
00359         if(self.runsOnRobot):
00360             try:
00361                 f = open("/sys/class/i2c-adapter/i2c-1/1-004c/temp2_input")
00362                 temp['HeadSilicium'] = float(f.readline()) / 1000.
00363                 f.close()
00364             except IOError:
00365                 self.runsOnRobot = False
00366                 return temp
00367             except:
00368                 temp['HeadSilicium'] = "invalid"
00369             try:
00370                 f = open("/sys/class/i2c-adapter/i2c-1/1-004c/temp1_input")
00371                 temp['HeadBoard'] = float(f.readline()) / 1000.
00372                 f.close()
00373             except IOError:
00374                 self.runsOnRobot = False
00375                 return temp
00376             except:
00377                 temp['HeadBoard'] = "invalid"
00378         return temp
00379 
00380 
00381 if __name__ == '__main__':
00382     
00383     updater = NaoDiagnosticUpdater()
00384     updater.start()
00385     
00386     rospy.spin()
00387     exit(0)