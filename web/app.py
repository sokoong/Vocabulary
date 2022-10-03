import json
import os
import random

f = open('words.json', encoding="utf8")
words = json.load(f)
f.close()


class bcolors:
    HEADER = '\033[95m'
    OKBLUE = '\033[94m'
    OKCYAN = '\033[96m'
    OKGREEN = '\033[92m'
    WARNING = '\033[93m'
    FAIL = '\033[91m'
    ENDC = '\033[0m'
    BOLD = '\033[1m'
    UNDERLINE = '\033[4m'


os.system('color')
random.shuffle(words)

for w in words:
    x = w[2].split(",")
    a = input(bcolors.HEADER + str(w[0]) + bcolors.ENDC + ": ")
    a = a.rstrip()
    if a in x:
        print("   "+bcolors.OKGREEN + str(w[2]) + bcolors.ENDC)
    else:
        print("   "+bcolors.FAIL + str(w[2]) + bcolors.ENDC)