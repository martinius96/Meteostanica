# Meteostanica
**Používaním projektu sa osoba zaväzuje k dodržiavaniu zmluvných podmienok MIT licencie, pod ktorou je projekt šírený! Uvedomuje si riziká, obmedzenia a svoje povinnosti. Všeobecne o MIT licencii: https://sk.wikipedia.org/wiki/MIT_licencia**
# Podporte projekt pre pridanie nových funkcionalít
* https://www.paypal.me/chlebovec
# Obsah projektu
* monitoring teplôt v domácnosti (vonkajšiu i vnútornú)
* monitoring vlhkosti, 
* monitoring atmosférického tlaku
* uloženie nameraných dát do MySQL databázy cez .PHP súbor s Arduinom v režime Webclient
# Čo budeme na projekt potrebovať?
![alt text](https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Arduino_Uno_-_R3.jpg/300px-Arduino_Uno_-_R3.jpg) Arduino UNO, 

![alt text](http://i.ebayimg.com/images/g/jWAAAOSwo0JWKdaF/s-l300.jpg)Ethernet Shield W5100, 

![alt text](https://images-na.ssl-images-amazon.com/images/I/31anMgqT9BL._SY300_.jpg)  ![alt text](https://images-na.ssl-images-amazon.com/images/I/41PtGDgGbzL._SY300_.jpg) 2x DS18B20 (indoor a outdoor typ), 

![alt text](https://d198pdkcx2sur5.cloudfront.net/31/ac/imageA2231ac334783c8c7bada706a42b8fc3586dfd322.jpg)DHT12 (meranie vlhkosti), 

![alt text](http://i.ebayimg.com/images/g/rR8AAOSwu1VW4CQC/s-l300.jpg) BMP280 (meranie tlaku)
# Schéma zapojenia
![alt text](https://i.nahraj.to/f/1JUd.JPG)
Arduino môžete kontrolovať. Ako vidíte v kóde, to, čo sa odošle do internetu (ak vôbec) tak sa vypíše aj na sériovej linke. Nezabudnite na predefinovanú rýchlosť 9600. Cez Putty je možné sledovať čo do internetu odišlo, aby ste vedeli, či máte pripojenie z Arduina aktívne. Odporúčam nastaviť IP napríklad na 192.168.1.254 kde nehrozí kolízia z rozsahu DHCP, ktorý je najčastejeiše 192.168.1.100-192.168.1.150. Nezabudnite, že pri čidlách DS18B20 je nutné použiť 4,7Kohm odpor pre možnosť využitia OneWire protokolu. 

Jedným vodičom prúdi napájanie i dáta na PIN 6. Neoficiálne zdroje hovoria, že ak napojíte onewire na krútenú dvojlinku, tak je možné je využiť až na 300 metrov. Niečo o OneWire protokole si môžete prečítať TU: https://cs.wikipedia.org/wiki/1-Wire
Následuje aj server-side časť. V scripte pre Arduino je spomenutý add.php súbor, na ktorý sa robí požiadavka GET metódou cez ? kde napr: temp1=20.34&temp2=21.88&hum1=47.58&pres1=1014.28 Takýto request môže byť uložený do databázy, ak je na PHP súbore nastavená metóda GET a na ňu je vytvorený MySQL request. 

Pre lepší výkon využívam súčasne najpoužívanejšie MySQLi. Súbor nie je dobré prezrádzať. Ak ho otvoríte na prázdno, tak sa všade uloží 0. V prípade, že niekto zistí link napríklad vasastranka.sk/add.php tak môže uložiť čo chce, napríklad temp1=5000 a podobne, nehovoriac o tom, že script nemá žiadne bezpečnostné prvky.

# Import tabuliek do MySQL databázy
Importovať súbor z priečinka /sql do phpmyadmin, alebo iného DB softvéru používajúceho MySQL databázu.

Po uložení týchto tabuliek je možné navrhnúť webstránku, kde budete vaše údaje zobrazovať. Pridávam screenshoty mojej, ktorú som si vytvoril vrátane .PHP kódov pre výpočet priemerov, vykreslenie naj hodnoty dňa, prognóza počasia.
![alt text](https://i.nahraj.to/f/1JUl.JPG)
![alt text](https://i.nahraj.to/f/1JUk.JPG)
![alt text](https://i.nahraj.to/f/1JUj.JPG)
![alt text](https://i.nahraj.to/f/1JUi.JPG)
![alt text](https://i.nahraj.to/f/1JUh.JPG)
![alt text](https://i.nahraj.to/f/1JUg.JPG)

# Vyhotovenie
![alt text](https://i.nahraj.to/f/1JUe.jpg)
![alt text](https://i.nahraj.to/f/1JUf.jpg)

# UPOZORNENIE NA ZÁVER: 
Ethernet Shield W5100 nepodporuje HTTPS protokol. Jeho procesor nezvláda šifrovanie a rovnako tak ani Arduino Uno nie je uspôsobený pre krypto operácie. Preto, ak chcete tento koncept vyskúšať, siahnite po HTTP hostingu. V prípade, že chcete testovať na HTTPS, zakúpte si Wifi Shield 101, alebo WiFi IoT čip ESP8266, ESP32. 
