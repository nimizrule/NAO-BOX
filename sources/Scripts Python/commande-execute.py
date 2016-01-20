import sys
comportement = ""+sys.argv[1]+""
from naoqi import ALProxy
comp=ALProxy("ALBehaviorManager","127.0.0.1",9559)
comp.startBehavior(""+comportement+"/behavior_1")

