#include <Keypad.h>
#define Password_Lenght 7
#define PIEZO   D0
#define NOTE_G4  392
#define NOTE_C5  523
#define NOTE_G5  784
#define NOTE_C6  1047
int sum = 1;
int Buzzer = D9;
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

void setup(){
  Serial.begin(9600);
  pinMode(D0,OUTPUT);
  pinMode(Buzzer,OUTPUT);
  Serial.print("Safe Box");
}


void loop() {
  // put your main code here, to run repeatedly:
  if (door == false)
  {
    customKey = myKeypad.getKey();
    if (customKey == '#')
    {
    Serial.println(" ");
    Serial.println(" Closing...");
    analogWrite(D0, 250);
    delay(150);
    analogWrite(D0, 0);
    delay(150);
    analogWrite(D0, 250);
    delay(150);
    analogWrite(D0, 0);
    delay(150);
    analogWrite(D0, 250);
    delay(150);
    analogWrite(D0, 0);
    delay(150);
      door = true;
    }
    
  }

  else Open();
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
      door = false;
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
