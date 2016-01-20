
import sys
adresseNao = ""+sys.argv[1]+""
from naoqi import ALProxy
comp=ALProxy("ALBehaviorManager",adresseNao,9559)
comp.stopAllBehaviors()
