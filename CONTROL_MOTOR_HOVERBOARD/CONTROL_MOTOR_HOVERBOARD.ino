int PWM_PIN_OUT_MOTOR1 = 8;     // Pin de control PWM para el motor 1
int BRAKE_PIN_MOTOR1 = A4;      // Pin de freno para el motor 1
int DIRECTION_PIN_MOTOR1 = A6;  // Pin de dirección para el motor 1

int PWM_PIN_OUT_MOTOR2 = 12;    // Pin de control PWM para el motor 2
int BRAKE_PIN_MOTOR2 = A3;      // Pin de freno para el motor 2
int DIRECTION_PIN_MOTOR2 = A7; // Pin de dirección para el motor 2

int valor_motor1 = 70;  // Valor inicial de PWM para el motor 1
int valor_motor2 = 70;  // Valor inicial de PWM para el motor 2

void setup() {
  Serial.begin(115200);  // Inicializar comunicación seriahttps://mad-ee.com/wp-content/uploads/2022/11/Test-Setup-scaled.jpl
  
  // Configurar pines como salidas
  pinMode(PWM_PIN_OUT_MOTOR1, OUTPUT);
  pinMode(BRAKE_PIN_MOTOR1, OUTPUT);
  pinMode(DIRECTION_PIN_MOTOR1, OUTPUT);
  
  pinMode(PWM_PIN_OUT_MOTOR2, OUTPUT);
  pinMode(BRAKE_PIN_MOTOR2, OUTPUT);
  pinMode(DIRECTION_PIN_MOTOR2, OUTPUT);
}

void loop() {
  // Controlar el motor 1
  analogWrite(PWM_PIN_OUT_MOTOR1, valor_motor1);  // Establecer el PWM para el motor 1
  digitalWrite(BRAKE_PIN_MOTOR1, LOW);           // Liberar el freno del motor 1
  digitalWrite(DIRECTION_PIN_MOTOR1, HIGH);       // Establecer la dirección del motor 1Z
  
  // Controlar el motor 2
  analogWrite(PWM_PIN_OUT_MOTOR2, valor_motor2);  // Establecer el PWM para el motor 2
  digitalWrite(BRAKE_PIN_MOTOR2, LOW);           // Liberar el freno del motor 2
  digitalWrite(DIRECTION_PIN_MOTOR2, LOW);       // Establecer la dirección del motor 2
  
  // Incrementar el valor del PWM para ambos motores
  //valor_motor1++;
  //if(valor_motor1 > 255) valor_motor1 = 100;  // Reiniciar el valor si supera el límite máximo
  
  //valor_motor2++;
  //if(valor_motor2 > 255) valor_motor2 = 100;  // Reiniciar el valor si supera el límite máximo
  
  delay(100);  // Esperar antes de la siguiente iteración
}
