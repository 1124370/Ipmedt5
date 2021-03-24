import mysql.connector

mydb = mysql.connector.connect(
    host="web0094.zxcs.nl",
    user="schoolproject_laravel",
    passwd="kvLXsjsPS",
    database="schoolproject_laravel"
)

mydb.commit()
