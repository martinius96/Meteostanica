#include <OneWire.h>
#include <DallasTemperature.h>
#define ONE_WIRE_BUS 6
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);
#include <SPI.h>
#include <DHT12.h>
#include "Adafruit_BMP280.h"
#include <Ethernet.h>
Adafruit_BMP280 bmp;
byte mac[] = { 0xAA, 0xBB, 0xCC, 0xDD, 0xEE, 0xFF };
char server[] = "www.mojastranka.sk";
IPAddress ip(192, 168, 1, 100);
EthernetClient client;
DHT12 dht12;
void setup() {
  sensors.begin();
  bmp.begin();
  delay(2000);
  Serial.begin(9600);
}

void loop() {
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Chyba konfiguracie cez DHCP");
    Ethernet.begin(mac, ip);
  }

  if (client.connect(server, 80)) {
    sensors.requestTemperatures();
    delay(1000);
    float teplota1 = sensors.getTempCByIndex(0);
    float teplota2 = sensors.getTempCByIndex(1);
    float vlhkost = dht12.readHumidity();
    float tlak = bmp.readPressure() / 100;
    float teplotabmp = bmp.readTemperature();
    float nadmorska_vyska = bmp.readAltitude(1013.25);
    float tlak_hladina_mora = tlak / pow(1 - ((0.0065 * nadmorska_vyska) / (teplotabmp + (0.0065 * nadmorska_vyska) + 273.15)), 5.257);
    Serial.println("Pripojenie uspesne na webserver");
    client.print("GET /add.php?temp1=");
    client.print(teplota1);
    client.print("&tempinside=");
    client.print(teplota2);
    client.print("&humidity=");
    client.print(vlhkost);
    client.print("&pressure=");
    client.print(tlak_hladina_mora);
    client.println(" HTTP/1.1");
    client.println("Host: www.mojastranka.sk");
    client.println("Connection: close");
    client.println();
    client.stop();
    Serial.println("Data uspesne odoslane...");
  } else {
    Serial.println("Pripojenie zlyhalo");
  }
  delay(59000);
}
