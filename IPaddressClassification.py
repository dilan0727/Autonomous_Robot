import cv2
import urllib.request
import numpy as np
import requests  # para hacer solicitudes HTTP

# PROGRAMA DE CLASIFICACION DE OBJETOS PARA VIDEO EN DIRECCION IP

url = 'http://192.168.4.1/cam-lo.jpg'
# url = 'http://192.168.1.6/'
winName = 'ESP32 CAMERA'
cv2.namedWindow(winName, cv2.WINDOW_AUTOSIZE)
# scale_percent = 80 # percent of original size    #para procesamiento de imagen

classNames = []
classFile = 'coco.names'
with open(classFile, 'rt') as f:
    classNames = f.read().rstrip('\n').split('\n')

configPath = 'ssd_mobilenet_v3_large_coco_2020_01_14.pbtxt'
weightsPath = 'frozen_inference_graph.pb'

net = cv2.dnn_DetectionModel(weightsPath, configPath)
net.setInputSize(320, 320)
# net.setInputSize(480,480)
net.setInputScale(1.0 / 127.5)
net.setInputMean((127.5, 127.5, 127.5))
net.setInputSwapRB(True)

# URL de la página web donde enviarás los datos
web_url = 'https://disenomecatronicorobot1.000webhostapp.com/receive_data.php'

while True:
    imgResponse = urllib.request.urlopen(url)  # abrimos el URL
    imgNp = np.array(bytearray(imgResponse.read()), dtype=np.uint8)
    img = cv2.imdecode(imgNp, -1)  # decodificamos

    img = cv2.rotate(img, cv2.ROTATE_90_CLOCKWISE)  # vertical

    classIds, confs, bbox = net.detect(img, confThreshold=0.5)
    print(classIds, bbox)

    if len(classIds) != 0:
        for classId, confidence, box in zip(classIds.flatten(), confs.flatten(), bbox):
            cv2.rectangle(img, box, color=(0, 255, 0), thickness=3)  # mostramos en rectangulo lo que se encuentra
            cv2.putText(img, classNames[classId - 1], (box[0] + 10, box[1] + 30), cv2.FONT_HERSHEY_COMPLEX, 1,
                        (0, 255, 0), 2)

    cv2.imshow(winName, img)  # mostramos la imagen

    # Preparar los datos para enviarlos a la página web
    _, img_encoded = cv2.imencode('.jpg', img)
    img_bytes = img_encoded.tobytes()
    files = {'image': ('image.jpg', img_bytes)}

    try:
        response = requests.post(web_url, files=files)
        print("Imagen enviada a la página web")
    except requests.exceptions.RequestException as e:
        print(f"Error al enviar la imagen: {e}")

    # esperamos a que se presione ESC para terminar el programa
    tecla = cv2.waitKey(5) & 0xFF
    if tecla == 27:
        break

cv2.destroyAllWindows()
