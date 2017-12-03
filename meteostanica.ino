#include <OneWire.h>                 //KNIZNICA ONEWIRE PRE VYUZITIE ONEWIRE ZBERNICE
#include <DallasTemperature.h>       //KNIZNICA PRE TEPLOTNE CIDLA DS18B20
#define ONE_WIRE_BUS 6               //DEFINICIA PINU AKO ZBERNICE PRE ONEWIRE ZARIADENIA.. TU ZBIERAME UDAJE
OneWire oneWire(ONE_WIRE_BUS);       //ONEWIRE ČÍTAŤ IBA NA PORTE DEFINOVANOM VYSSIE
DallasTemperature sensors(&oneWire); //PRIRADENIE SENZOROV DALLAS DS18B20 NA ONEWIRE ZBERNICU
#include <SPI.h>                     //KNIZNICA SPI.H, PODPORUJE AJ I2C PRIPOJENIA PRE BMP280
#include <DHT12.h>                   //KNIŽNICA NA SENZOR DHT12 PRE ZAZNAM VLHKOSTI
#include "Adafruit_BMP280.h"         //LOKALNA KNIZNICA SENZORA BMP
#include <Ethernet.h>                //KNIZNICA ETHERNET.H PRE MOZNOST VYUZITIA ETHERNET SHIELDU
#define Hostname "Meno zariadenia v sieti"            //DEFINICIA MENA V SIETI
Adafruit_BMP280 bmp;                 // BMP280 NA ZBERNICI I2C
byte mac[] = { 0xAA, 0xBB, 0xCC, 0xDD, 0xEE, 0xFF };            //MAC ADRESA --> VOLITELNA
char server[] = "www.mojastranka.sk";      //ADRESA WEBSERVERA (MOZE BYT AJ IP ADRESA, AK NEVYUZIVA DNS)
IPAddress ip(192, 168, 1, 100);                               //IP ADRESA ZARIADENIA V SIETI V LOKALNEJ SIETI
EthernetClient client;                                          //SPUSTENIE ETHERNETU AKO CLIENTA
DHT12 dht12;                                                    //INICIALIZACIA SENZORU DHT12
void setup() {                                                  //FUNKCIA NA DEFINICIU VSTUPOV A VYSTUPOV ZAPNUTIE
  sensors.begin();                                              //START SENZOROV POD ONEWIRE (DALLASTEMPERATURE)
  bmp.begin();                                                  //SPUSTENIE SNIMACA BMP280
  delay(2000);                                                  //POZDRZANIE PROGRAMU 2 SEKUNDY POKYM SA INICIALIZUJE BMP280 a SENZORY
  Serial.begin(9600);                                           //SPUSTENIE SERIOVEJ LINKY NA CITACIU RYCHLOST 9600
  while (!Serial) {
    ;                                                           //CAKA POKYM SA SERIOVY PORT NEZAPNE
  }



}

void loop() {                                      //ZACIATOK SLUCKY
  if (Ethernet.begin(mac) == 0) {                  //V PRIPADE ZLYHANIA NASTAVENIA MAC ADRESY VYPIŠ
    Serial.println("Chyba konfiguracie cez DHCP"); //SERIOVY VYPIS CHYBY KONFIGURACIE DHCP
    Ethernet.begin(mac, ip);                       //NASTAVENIE IP A MAC ADRESY PRE ETHERNET MODUL
  }
                              
  if (client.connect(server, 80)) {               // AK SA NAPOJI NA SERVER NA PORTE 80 (HTTP)
    sensors.requestTemperatures();                //VYZIADANIE HODNOT ZO SENZOROV
    Serial.println("Pripojenie uspesne na webserver"); //VYPIS NA SERIOVU LINKU
    client.print("GET /add.php?temp1=");         //ZAČIATOK HTTP REQUEST --> client.print GET METODOU s oznacenim premennej, do ktorej pridame hodnotu v URL
    client.print(sensors.getTempCByIndex(0));    // VYPIS HODNOTY 1. SENZORU NA INDEXE 0 DO URL
    client.print("&tempinside=");                     //TEXTOVE DOPLNENIE DRUHEJ PREMENNEJ DO KTOREJ UVEDIEME COMU SA ROVNA TAKTIEZ V URL
    client.print(sensors.getTempCByIndex(1));    // VYPIS HODNOTY 2. SENZORU NA INDEXE 1 DO URL
    client.print("&humidity=");                      //TEXTOVE DOPLNENIE TRETEJ PREMENNEJ DO KTOREJ UVEDIEME COMU SA ROVNA TAKTIEZ V URL
    client.print(dht12.readHumidity());          // VYPIS VLHKOMERU DO LINKU, HODNOTA, KTOREJ SA ROVNA PREMENNA HUM1
    client.print("&pressure=");                     //TEXTOVE DOPLNENIE STVRTEJ PREMENNEJ DO KTOREJ UVEDIEME COMU SA ROVNA TAKTIEZ V URL
    client.print((bmp.readPressure() / 100) + 30, 120481927710843373493975903614); // VYPIS BAROMETRA DO LINKU + PRIPOCITANA KONSTANTA NA ZAKLADE NADMORSKEJ VYSKY PRE SPRAVNY PREPOCET NA RELATIVNY TLAK
    client.println(" HTTP/1.1");                 // UKONCENIE REQUESTU ZALOMENIM RIADKA A DOPLNENIM HLAVICKY HTTP S VERZIOU
    client.println("Host: www.mojastranka.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();                            //ZALOMENIE RIADKA KLIENTSKEHO ZAPISU
    client.stop();                                   // UKONCENIE PRIPOJENIA ETHERNET SHIELDU
    Serial.println("Odoslane hlavicky s datami: ");  //SERIOVY VYPIS O STAVE USPESNOSTI PRENOSU
    Serial.println("Teplota von: ");                 //SERIOVY VYPIS TEXT O TEPLOTE
    Serial.println(sensors.getTempCByIndex(0));      //SERIOVY VYPIS STAV TEPLOTY NA SENZORE EVIDOVANOM NA INDEXE 0
    Serial.println("Teplota dnu: ");                 //SERIOVY VYPIS TEXT O TEPLOTE
    Serial.println(sensors.getTempCByIndex(1));      //SERIOVY VYPIS STAV TEPLOTY NA SENZORE EVIDOVANOM NA INDEXE 1
    Serial.println("Vlhkost vzduchu: ");             //SERIOVY VYPIS TEXT O VLHKOSTI VZDUCHU
    Serial.println(dht12.readHumidity());            //SERIOVY VYPIS STAVU VLHKOSTI
    Serial.println("Atmosfericky tlak: ");           //SERIOVY VYPIS TEXT O TLAKU VZDUCHU
    Serial.println((bmp.readPressure() / 100) + 30, 120481927710843373493975903614); //SERIOVY VYPIS STAVU RELATIVNEHO TLAKU 30,... je konstanta pre nadmorsku vysku, ktora sa prirata k teplote. (Použite pri nadmorskej do 1000m nadmorska vyska/8,3 tuto hodnotu napiste namiesto 30,...)
    Serial.println("Odpojenie uspesne.");            //SERIOVY VYPIS O STAVE USPESNOSTI PRENOSU
  } else {                                           // AK SA PRIPOJENIE NA SERVER NEPODARI
    Serial.println("Pripojenie zlyhalo");            //SERIOVY VYPIS O NEUSPESNOSTI PRIPOJENIA --> ŽIADNY HTTP REQUEST NEBOL VYKONANY
  }




  delay(15000); //15 SEKUND PAUZA POKYM NANOVO POBEZI SLUCKA PRE NOVE PRIPOJENIE A ODOSLANIE DALSICH HODNOT
}

