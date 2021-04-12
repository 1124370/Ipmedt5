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


def sendToDb(data):
    print(data)
    mycursor = mydb.cursor()
    mycursor.execute("DELETE FROM decibel LIMIT 1;") 
    mycursor.execute("INSERT INTO decibel (waardes) VALUES (%s)", (int(data),))
    mydb.commit()

while True:
    mycursor.execute("Select * FROM niet_storen;")
    for x in mycursor:
        print(x[1])
    if x[1] == 'aan':
        print(x[1])
        port.write("l1")
    else:
        port.write("l0")
    time.sleep(1)


    rcv = port.readline().strip()
    if rcv:
        sendToDb(rcv)

#     os.system("python update.py")
# else(rcv == 'N'):
#     print("not")
#     os.system("python no-update.py")

time.sleep(1)
mydb.commit()

mydb.close()