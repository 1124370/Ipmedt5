import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="web0094.zxcs.nl",
    user="schoolproject_laravel",
    passwd="kvLXsjsPS",
    database="schoolproject_laravel"
)

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
mycursor = mydb.cursor()

while True:
    mycursor.execute("Select * FROM focus_modus;")
    for x in mycursor:
        print(x[1])
    if x[1] == 'aan':
        print(x[1])
        port.write("l1")
    else:
        port.write("l0")



    # rcv = port.readLine().strip()
    # if (rcv == 'b'):
    #     os.system("python update.py")

    time.sleep(1)
    mydb.commit()

mydb.close()