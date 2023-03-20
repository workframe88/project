#define BLYNK_PRINT Serial
#include <ESP8266WiFi.h>
#include <BlynkSimpleEsp8266.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Keypad_I2C.h>
#include <Keypad.h>
#include <Wire.h>
#define I2CADDR 0x21  // กำหนด Address ของ I2C
const byte ROWS = 4;  // กำหนดจำนวนของ Rows
const byte COLS = 4;  // กำหนดจำนวนของ Columns
// กำหนด Key ที่ใช้งาน (4x4)
char keys[ROWS][COLS] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'}
};
// กำหนด Pin ที่ใช้งาน (4x4)
byte rowPins[ROWS] = {0, 1, 2, 3}; // เชื่อมต่อกับ Pin แถวของปุ่มกด
byte colPins[COLS] = {4, 5, 6, 7}; // เชื่อมต่อกับ Pin คอลัมน์ของปุ่มกด

Keypad_I2C keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS, I2CADDR, PCF8574 );

#include <EEPROM.h>
#include <TridentTD_LineNotify.h>
#include <FS.h>
#include <ESP8266HTTPClient.h>
//Setup WiFi
#define SSID "Taiyong"
#define PASSWORD "075611818"

//Setup IP Camera (Generic P2P IP Camera)
String IPCAM_IP = "192.168.0.103";
String IPCAM_USERNAME = "";
String IPCAM_PASSWORD = "";
#define TOKENCOUNT  1  
String tokens[TOKENCOUNT] = {"2wLOkLpQWuJwO9INWxY0A9hk3ePvsMh79gsWjFk463V"};
bool ipCameraEnabled = true;      //Use IP Camera or just send the message?
int digitalPin = D0;              //Sensor IR
int val2 = 0;                      //Input Number for Sensor IR
int IR = 0;                       //Work order if IR = 1 Buzzer doorbell
int toltal = 0;                   //Work order if IR = 0

#include <Keypad.h>
#define Password_Lenght 7
#define PIEZO   D9
#define NOTE_G4  392
#define NOTE_C5  523
#define NOTE_G5  784
#define NOTE_C6  1047
int sum = 1;
int Buzzer = D9;
bool door = true;
char  Data[Password_Lenght]; // 6 is the number of chars it can hold + the null char = 7
char  Master[Password_Lenght] = "123456";
byte data_count = 0, master_count = 0;
char customKey;

int OpenMelody[] = {NOTE_G5, NOTE_C6};
int OpenNoteDurations[] = {12, 8};

int CloseMelody[] = {NOTE_C6, NOTE_G5};
int CloseNoteDurations[] = {12, 8};
#define playOpenMelody() playMelody(OpenMelody, OpenNoteDurations, 8)
#define playCloseMelody() playMelody(CloseMelody, CloseNoteDurations, 8)

#define SS_PIN D8
#define RST_PIN D4
#define SLN_PIN D3

MFRC522 mfrc522(SS_PIN, RST_PIN);
unsigned long uidDec, uidDecTemp;
int ARRAYindexUIDcard;
int EEPROMstartAddr;
long adminID = 1122539531;
bool beginCard = 0;
bool addCard = 1;
bool skipCard = 0;
int LockSwitch;
unsigned long CardUIDeEPROMread[] = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9};
int PiezoPin = D9;

char auth[] = "44LHQ5E2suW2KuZdSP5PcZcsYic1RV_T";
char ssid[] = "Taiyong";
char pass[] = "075611818";
char sever[] = "oasiskit.com";
int port = 8080;
boolean key = true ;
WidgetLCD lcd(V0);

void setup() {
  Serial.begin(9600);
  Wire.begin();  // เรียกการเชื่อมต่อ Wire
  keypad.begin( makeKeymap(keys) );  // เรียกกาเชื่อมต่อ
  
  Blynk.begin(auth, ssid, pass, "oasiskit.com", 8080);
  lcd.clear(); //Use it to clear the LCD Widget
  EEPROM.begin(512);
  DisplayWAiT_CARD();
  EEPROMreadUIDcard();
  pinMode(digitalPin, INPUT);
  pinMode(SLN_PIN, OUTPUT); digitalWrite(SLN_PIN, HIGH);
  pinMode(PiezoPin, OUTPUT);
  pinMode(D9, OUTPUT);
  pinMode(Buzzer,OUTPUT);
  SPI.begin();
  mfrc522.PCD_Init();

  WiFi.begin(SSID, PASSWORD);
  Serial.printf("WiFi connecting to %s\n",  SSID);
  while(WiFi.status() != WL_CONNECTED) { Serial.print("."); delay(400); }
  Serial.printf("\nWiFi connected\nIP : ");
  Serial.println(WiFi.localIP());  
  delay(1000);

  if(ipCameraEnabled){
    Serial.begin(9600);
    Wire.begin();  // เรียกการเชื่อมต่อ Wire
  keypad.begin( makeKeymap(keys) );  // เรียกกาเชื่อมต่อ
    //Initialize File System
    if(SPIFFS.begin()){
      Serial.println("SPIFFS Initialize....ok");
    }else{
      Serial.println("SPIFFS Initialization...failed");
    }
   
    //Format File System
    if(SPIFFS.format()){
      Serial.println("File System Formated");
    }else{
      Serial.println("File System Formatting Error");
    }
    
  }

  Serial.println("-- Doorbell Line notify READY --");
   
  analogWrite(PiezoPin, 250), delay(100), analogWrite(PiezoPin, 0);

  
}

void downloadAndSaveFile(String fileName, String  url){
  
  HTTPClient http;
  Serial.println("[HTTP] begin...\n");
  Serial.println(fileName);
  Serial.println(url);
  http.begin(url);
  
  Serial.printf("[HTTP] GET...\n", url.c_str());
  // start connection and send HTTP header
  int httpCode = http.GET();
  if(httpCode > 0) {
      // HTTP header has been send and Server response header has been handled
      Serial.printf("[HTTP] GET... code: %d\n", httpCode);
      Serial.printf("[FILE] open file for writing %d\n", fileName.c_str());
      
      File file = SPIFFS.open(fileName, "w");

      // file found at server
      if(httpCode == HTTP_CODE_OK) {

          // get lenght of document (is -1 when Server sends no Content-Length header)
          int len = http.getSize();

          // create buffer for read
          uint8_t buff[128] = { 0 };

          // get tcp stream
          WiFiClient * stream = http.getStreamPtr();

          // read all data from server
          while(http.connected() && (len > 0 || len == -1)) {
              // get available data size
              size_t size = stream->available();
              if(size) {
                  // read up to 128 byte
                  int c = stream->readBytes(buff, ((size > sizeof(buff)) ? sizeof(buff) : size));
                  // write it to Serial
                  //Serial.write(buff, c);
                  file.write(buff, c);
                  if(len > 0) {
                      len -= c;
                  }
              }
              delay(1);
          }

          Serial.println();
          Serial.println("[HTTP] connection closed or file end.\n");
          Serial.println("[FILE] closing file\n");
          file.close();
          
      }
      
  }
  http.end();
}

void sendLineNotify(){

  for (int i = 0; i < TOKENCOUNT; i++){
      Serial.println("Send message " + i +1);
      LINE.setToken(tokens[i]);
      LINE.notify("Someone at frontdoor");
  }

  if(ipCameraEnabled){
     downloadAndSaveFile("/capture","http://"+ IPCAM_IP +"/capture");
    //listFiles();  
    for (int i = 0; i < TOKENCOUNT; i++){
      Serial.println("Send image " + i +1);
      LINE.setToken(tokens[i]);
      LINE.notifyPicture("Camera snapshot", SPIFFS, "/capture");
      }
  }
  
}

void listFiles(void) {
  Serial.println();
  Serial.println("SPIFFS files found:");

  Dir dir = SPIFFS.openDir("/"); // Root directory
  String  line = "=====================================";

  Serial.println(line);
  Serial.println("  File name               Size");
  Serial.println(line);

  while (dir.next()) {
    String fileName = dir.fileName();
    Serial.print(fileName);
    int spaces = 25 - fileName.length(); // Tabulate nicely
    while (spaces--) Serial.print(" ");
    File f = dir.openFile("r");
    Serial.print(f.size()); Serial.println(" bytes");
  }

  Serial.println(line);
  Serial.println();
  delay(1000);
}

void loop() {

   val2 = digitalRead(digitalPin);  
  //Serial.print("val = "); 
  //Serial.println(val);
  if (val2 == 0) { 
    
    if(IR == 1){
      toltal++;
      Serial.println(toltal);
      delay(1000);
   
      if(toltal == 5){
          IR = 0;
          toltal = 0;
      }
   
    }
  }
  if (val2 == 1) {
    if(IR == 0){
    sendLineNotify();
    Serial.println("Buzzer --------------------------------");
        digitalWrite(Buzzer, 1);
        delay(5000);
        digitalWrite(Buzzer, 0);
        delay(100);
    }
    
  }
  
  if ( key == true)
  {
  digitalWrite(SLN_PIN, HIGH);

  if (beginCard == 0) {
    if ( ! mfrc522.PICC_IsNewCardPresent()) {  //Look for new cards.
      Blynk.run();    
      return;
    }

    if ( ! mfrc522.PICC_ReadCardSerial()) {  //Select one of the cards.
      Blynk.run();
      return;
    }
  }

  
  //Read "UID".
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    uidDecTemp = mfrc522.uid.uidByte[i];
    uidDec = uidDec * 256 + uidDecTemp;
  }

  if (beginCard == 1 || LockSwitch > 0)EEPROMwriteUIDcard();  //uidDec == adminID

  if (LockSwitch == 0) {
    //CardUIDeEPROMread.
    for (ARRAYindexUIDcard = 0; ARRAYindexUIDcard <= 9; ARRAYindexUIDcard++) {
      if (CardUIDeEPROMread[ARRAYindexUIDcard] > 0) {
        if (CardUIDeEPROMread[ARRAYindexUIDcard] == uidDec) {
          lcd.print(0, 0, "CARD ACCESS OPEN");
          lcd.print(3, 1, uidDec);
          //digitalWrite(SLN_PIN, HIGH); //unlock
          key = false;
          //digitalWrite(D0, HIGH); //led
          analogWrite(PiezoPin, 250), delay(200), analogWrite(PiezoPin, 0);
          delay(2000);
          break;   
        }       
      }
    }

    if (ARRAYindexUIDcard == 10) {
      lcd.print(0, 0, " Card not Found ");
      lcd.print(0, 1, "                ");
      lcd.print(0, 1, "ID : ");
      lcd.print(5, 1, uidDec);
      for (int i = 0; i <= 2; i++)delay(100), analogWrite(PiezoPin, 250), delay(100), analogWrite(PiezoPin, 0);
      //digitalWrite(SLN_PIN, LOW);  //lock();
      //digitalWrite(D0, LOW); //led
      delay(2000);
    }
    ARRAYindexUIDcard = 0;
    DisplayWAiT_CARD();
  }
  
 }
  else Open();
  //Blynk.run();
}

BLYNK_WRITE(V1) {
  int a = param.asInt();
  if (a == 1) beginCard = 1; else beginCard = 0;
}

BLYNK_WRITE(V2) {
  int a = param.asInt();
  if (a == 1) {
    skipCard = 1;
    if (EEPROMstartAddr / 5 < 10) EEPROMwriteUIDcard();
  } else {
    skipCard = 0;
  }
}

BLYNK_WRITE(V3){
  String str = param.asStr();  // Text Input Widget - Strings
  int str_len = str.length() + 1;
  str.toCharArray(Master, str_len);
  LINE.notify("Password changed");
  LINE.notify(Master);
  Blynk.virtualWrite(V4, Master);
}

void EEPROMwriteUIDcard() {

  if (LockSwitch == 0) {
    lcd.print(0, 0, " START REC CARD ");
    lcd.print(0, 1, "PLEASE TAG CARDS");
    delay(500);
  }

  if (LockSwitch > 0) {
    if (skipCard == 1) {  //uidDec == adminID
      lcd.print(0, 0, "   SKIP RECORD   ");
      lcd.print(0, 1, "                ");
      lcd.print(0, 1, "   label : ");
      lcd.print(11, 1, EEPROMstartAddr / 5);
      EEPROMstartAddr += 5;
      skipCard = 0;
    } else {
      Serial.println("writeCard");
      analogWrite(PiezoPin, 250), delay(200), analogWrite(PiezoPin, 0);
      EEPROM.write(EEPROMstartAddr, uidDec & 0xFF);
      EEPROM.write(EEPROMstartAddr + 1, (uidDec & 0xFF00) >> 8);
      EEPROM.write(EEPROMstartAddr + 2, (uidDec & 0xFF0000) >> 16);
      EEPROM.write(EEPROMstartAddr + 3, (uidDec & 0xFF000000) >> 24);
      EEPROM.commit();
      delay(10);
      lcd.print(0, 1, "                ");
      lcd.print(0, 0, "RECORD OK! IN   ");
      lcd.print(0, 1, "MEMORY : ");
      lcd.print(9, 1, EEPROMstartAddr / 5);
      EEPROMstartAddr += 5;
      delay(500);
    }
  }
  LockSwitch++;
  if (EEPROMstartAddr / 5 == 10) {
    lcd.clear();
    lcd.print(0, 0, "RECORD FINISH");
    delay(2000);
    EEPROMstartAddr = 0;
    uidDec = 0;
    ARRAYindexUIDcard = 0;
    EEPROMreadUIDcard();
  }
}
void EEPROMreadUIDcard() {
  for (int i = 0; i <= 9; i++) {
    byte val = EEPROM.read(EEPROMstartAddr + 3);
    CardUIDeEPROMread[ARRAYindexUIDcard] = (CardUIDeEPROMread[ARRAYindexUIDcard] << 8) | val;
    val = EEPROM.read(EEPROMstartAddr + 2);
    CardUIDeEPROMread[ARRAYindexUIDcard] = (CardUIDeEPROMread[ARRAYindexUIDcard] << 8) | val;
    val = EEPROM.read(EEPROMstartAddr + 1);
    CardUIDeEPROMread[ARRAYindexUIDcard] = (CardUIDeEPROMread[ARRAYindexUIDcard] << 8) | val;
    val = EEPROM.read(EEPROMstartAddr);
    CardUIDeEPROMread[ARRAYindexUIDcard] = (CardUIDeEPROMread[ARRAYindexUIDcard] << 8) | val;

    ARRAYindexUIDcard++;
    EEPROMstartAddr += 5;
  }

  ARRAYindexUIDcard = 0;
  EEPROMstartAddr = 0;
  uidDec = 0;
  LockSwitch = 0;
  DisplayWAiT_CARD();
}

void DisplayWAiT_CARD() {
  lcd.print(0, 0, "   ATTACH THE   ");
  lcd.print(0, 1, "      CARD      ");
  digitalWrite(D10, LOW); //led
}

void clearData()
{
  while (data_count != 0)
  { // This can be used for any array size,
    Data[data_count--] = 0; //clear array for new data
  }
  return;
}
void Open()
{
  //Serial.println(" Enter Password ");
  customKey = keypad.getKey();
  
   if (customKey)                  // makes sure a key is actually pressed, equal to (customKey != NO_KEY)
  {
    Data[data_count] = customKey;
    Serial.print(customKey);  // print char at said cursor
    analogWrite(PiezoPin, 250);
    delay(100);
    analogWrite(PiezoPin, 0);
    delay(100);
    data_count++; 
  }

  if (data_count == Password_Lenght - 1) // if the array index is equal to the number of expected chars, compare data to master
  {
    if (!strcmp(Data, Master))           // equal to (strcmp(Data, Master) == 0)
    {
      Serial.println(" ");
      Serial.println("Access Pass");
      sendLineNotify();
      key = true;
      sum = 1;
      IR=1;
      playOpenMelody();
      digitalWrite(SLN_PIN, LOW);  //unlock();
      delay(5000);
      digitalWrite(SLN_PIN, HIGH);  //lock();
    }
    else
    {
      if(sum != 3){
      Serial.println(" ");
      Serial.println("Access False");
      playCloseMelody();
      door = true;
      sum++;
      }
      else{
        sendLineNotify();
        Serial.println(" ");
        Serial.println("Buzzer --------------------------------");
        digitalWrite(Buzzer, 1);
        delay(5000);
        digitalWrite(Buzzer, 0);
        delay(100);
        sum = 1;
        clearData();
        key = true;
      }
    }
    clearData();
  }
}

void playMelody(int *melody, int *noteDurations, int notesLength)
{
  pinMode(PIEZO, OUTPUT);
  for (int thisNote = 0; thisNote < notesLength; thisNote++) {
    int noteDuration = 1000 / noteDurations[thisNote];
    tone(PIEZO, melody[thisNote], noteDuration);
    int pauseBetweenNotes = noteDuration * 1.30;
    delay(pauseBetweenNotes);
    noTone(PIEZO);
  }
}
