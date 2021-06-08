import pickle
from datetime import date

import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="health",
    port=3306
)

mycursor = mydb.cursor()

emptyQuery = "TRUNCATE TABLE prediction;"
mycursor.execute(emptyQuery)


diseases = ['Maleria','Dangue','Typhoid','Viral Fever']

data = {}

for d in diseases:
    fileName = d + '.pkl'
    with open(fileName, 'rb') as file:
        model = pickle.load(file)

    data[d] = {}
    for i in range(1,13):
        pred = model.get_forecast(steps = i)
        forecast = pred.predicted_mean.to_numpy()[-1]
        data[d][i] = int(forecast)

for month in range(1,13):
    query = "INSERT INTO prediction (location, malaria, dangue, typhoid, viral_fever) VALUES (%s, %s, %s, %s, %s)"
    val = (0, data[diseases[0]][month], data[diseases[1]][month], data[diseases[2]][month], data[diseases[3]][month])
    mycursor.execute(query, val)

mydb.commit()
