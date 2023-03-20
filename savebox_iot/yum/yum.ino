#define BLYNK_PRINT Serial
#include <ESP8266WiFi.h>
#include <BlynkSimpleEsp8266.h>
#include <SPI.h>
#include <MFRC522.h>
#include <EEPROM.h>

#include <Keypad.h>
#define Password_Lenght 7
#define PIEZO   D0
#define NOTE_G4  392
#define NOTE_C5  523
#define NOTE_G5  784
#define NOTE_C6  1047
int sum = 1;
int Buzzer = D0;
bool door = true;
char Data[Password_Lenght]; // 6 is the number of chars it can hold + the null char = 7
char Master[Password_Lenght] = "123456";
byte data_count = 0, master_count = 0;

char customKey;
const byte ROWS = 4; //four rows

const byte COLS = 4; //three columns

char keys[ROWS][COLS] = {

  {'1','2','3','A'},

  {'4','5','6','B'},

  {'7','8','9','C'},

  {'*','0','#','D'}

};

byte rowPins[ROWS] = {D1, D2, D3, D4}; //connect to the row pinouts of the keypad

byte colPins[COLS] = {D5, D6, D7, D8}; //connect to the column pinouts of the keypad

Keypad myKeypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );

int OpenMelody[] = {NOTE_G5, NOTE_C6};
int OpenNoteDurations[] = {12, 8};

int CloseMelody[] = {NOTE_C6, NOTE_G5};
int CloseNoteDurations[] = {12, 8};
#define playOpenMelody() playMelody(OpenMelody, OpenNoteDurations, 8)
#define playCloseMelody() playMelody(CloseMelody, CloseNoteDurations, 8)

#define SS_PIN D8
#define RST_PIN D4
#define SLN_PIN D10

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
int PiezoPin = D0;

char auth[] = "MriiorKy4DvKRpaRBvAtIjFKx1B8UUt2";
char ssid[] = "Taiyong";
char pass[] = "075611818";
char sever[] = "oasiskit.com";
int port = 8080;
boolean key = true ;
WidgetLCD lcd(V0);

void setup() {
  Serial.begin(9600);
  
  pinMode(SLN_PIN, OUTPUT); digitalWrite(SLN_PIN, HIGH);
  pinMode(PiezoPin, OUTPUT);
  pinMode(D0, OUTPUT);
  pinMode(Buzzer,OUTPUT);
  SPI.begin();
  mfrc522.PCD_Init();

  Blynk.begin(auth, ssid, pass, "oasiskit.com", 8080);
  lcd.clear(); //Use it to clear the LCD Widget
  EEPROM.begin(512);
  DisplayWAiT_CARD();
  EEPROMreadUIDcard();
  
  analogWrite(PiezoPin, 250), delay(100), analogWrite(PiezoPin, 0);

}

void loop() {

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
          digitalWrite(SLN_PIN, LOW); //unlock
          key = false;
          digitalWrite(D0, HIGH); //led
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
      digitalWrite(SLN_PIN, HIGH);  //lock();
      digitalWrite(D0, LOW); //led
      delay(2000);
    }
    ARRAYindexUIDcard = 0;
    DisplayWAiT_CARD();
  }
  
  }
  //
  else Open();
  Blynk.run();
  //
  
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
  digitalWrite(D0, LOW); //led
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
  customKey = myKeypad.getKey();
  
   if (customKey)                  // makes sure a key is actually pressed, equal to (customKey != NO_KEY)
  {
    Data[data_count] = customKey;
    Serial.print(customKey);  // print char at said cursor
    analogWrite(D0, 250);
    delay(100);
    analogWrite(D0, 0);
    delay(100);
    data_count++; 
  }

  if (data_count == Password_Lenght - 1) // if the array index is equal to the number of expected chars, compare data to master
  {
    if (!strcmp(Data, Master))           // equal to (strcmp(Data, Master) == 0)
    {
      Serial.println(" ");
      Serial.println("Access Pass");
      playOpenMelody();
      key = true;
      sum = 1;
      
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
        Serial.println(" ");
        Serial.println("Buzzer --------------------------------");
        digitalWrite(Buzzer, 1);
        delay(5000);
        digitalWrite(Buzzer, 0);
        delay(1000);
        sum = 1;
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
