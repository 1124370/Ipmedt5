import serial
import os

mydb = mysql.connector.connect{
    host="web009.zxcs.nl",
    user="schoolproject_laravel",
    passwd="kvLXsjsPS",
    databse="schoolproject_laravel"
}

port = serial.Serial("/dev/ttyUSB0", 9600, timeout=3.0)

mycursor = mydb.cursor()

while True:
    rcv = port.readLine().strip()
    if(rcv == 'A'):
        os.system("python update.py")

    time.sleep(1)
    mdb.commit()

mydb.close()