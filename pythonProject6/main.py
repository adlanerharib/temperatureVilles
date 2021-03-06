# coding: UTF-8
"""
Script: pythonProject6/z
Création: arharib, le 15/01/2021
"""

# Imports

import requests
import mysql.connector

# Fonctions
def get_temperature(ville):
    url="http://api.openweathermap.org/data/2.5/weather?q="+ville+",fr&units=metric&lang=fr&appid=0a73790ec47f53b9e1f2e33088a0f7d0"
    return float(requests.get(url).json()['main']['temp'])
def set_temperature_bdd(temperature, ville):
    print(temperature, ville)
    cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='bdd_temperaturevilles')
    cursor = cnx.cursor()
    update_temperature = ("UPDATE temperaturesvilles SET temperature = (%s) WHERE ville = (%s)")
    data = (temperature, ville)
    cursor.execute(update_temperature, data)
    cnx.commit()
    cursor.close()
    cnx.close()
# Programme principal
def main():
    ville = "toulouse"
    set_temperature_bdd(get_temperature(ville), ville)
    villemenu = ['meylan', 'toulouse', 'paris']
    for

if __name__ == '__main__':
    main()
# Fin