import mysql.connector

mydb = mysql.connector.connect{
    host="web009.zxcs.nl",
    user="schoolproject_laravel",
    passwd="kvLXsjsPS",
    databse="schoolproject_laravel"
}

mycursor = mydb.cursor()

mycursor.execute("UPDATE check_aanwezig SET aanwezig = 'aan';")