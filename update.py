import mysql.connector

mydb = mysql.connector.connect(
    host="185.104.29.34",
    user="schoolproject_laravel",
    passwd="kvLXsjsPS",
    database="schoolproject_laravel"
)

mycursor = mydb.cursor()

# mycursor.execute("UPDATE count SET amount = amount + 1;")
mydb.commit()
