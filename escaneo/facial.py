from flask import Flask, request, jsonify, render_template
import cv2
import face_recognition
import mysql.connector
import numpy as np
import base64
import json
import os
import signal
import webbrowser
from threading import Timer

app = Flask(__name__)

# Configuración de la base de datos
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="sistema_escolar"  # Actualiza el nombre de la base de datos
)
cursor = db.cursor()

# Función para cargar los rostros registrados desde la base de datos
def cargar_rostros():
    cursor.execute("SELECT numero_control, nombre_completo, rostro_encoding FROM registro_qr")  # Actualiza el nombre de la tabla
    datos = cursor.fetchall()
    rostros_registrados = {"datos": [], "encodings": []}
    
    for numero_control, nombre_completo, encoding in datos:
        if encoding is None or encoding == "":
            print(f"El encoding para {numero_control} es NULL o vacío.")
        else:
            rostros_registrados["datos"].append({"numero_control": numero_control, "nombre_completo": nombre_completo})
            try:
                rostros_registrados["encodings"].append(json.loads(encoding))  
            except json.JSONDecodeError:
                print(f"Error al decodificar el encoding para {numero_control}")
    
    return rostros_registrados

# Función para reconocer rostros en un frame
def reconocimiento_facial(frame, rostros_registrados):
    rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    rostros_encodings = face_recognition.face_encodings(rgb_frame)
    if rostros_encodings:
        for rostro_encoding in rostros_encodings:
            resultados = face_recognition.compare_faces(rostros_registrados["encodings"], rostro_encoding, tolerance=0.5)
            if True in resultados:
                index = resultados.index(True)
                return rostros_registrados["datos"][index]  # Devuelve los datos del rostro reconocido
    return None

@app.route('/')
def index():
    # Aquí se carga la página HTML
    return render_template('camera.html')

@app.route('/reconocer', methods=['POST'])
def reconocer_rostro():
    rostros_registrados = cargar_rostros()
    
    data = request.json
    if 'image' not in data:
        return jsonify({"error": "No se recibió una imagen."}), 400

    # Decodificar la imagen Base64
    image_data = base64.b64decode(data['image'].split(',')[1])
    np_image = np.frombuffer(image_data, np.uint8)
    frame = cv2.imdecode(np_image, cv2.IMREAD_COLOR)
    
    alumno_reconocido = reconocimiento_facial(frame, rostros_registrados)

    if alumno_reconocido:
        return jsonify({
            "nombre_completo": alumno_reconocido["nombre_completo"],
            "numero_control": alumno_reconocido["numero_control"]
        })
    else:
        return jsonify({"error": "Rostro no reconocido."}), 404

@app.route('/cerrarServidor', methods=['POST'])
def salir():
    """Cierra el servidor de desarrollo Flask"""
    func = request.environ.get('werkzeug.server.shutdown')
    if func is None:
        raise RuntimeError('No se puede apagar el servidor.')
    func()
    return jsonify({"message": "Servidor detenido correctamente."}), 5000

@app.route('/adios')
def adios():
    # Página de despedida
    return render_template('adios.html')

# Función para abrir automáticamente la página en el navegador
def abrir_pagina():
    webbrowser.open("http://127.0.0.1:5000/")  # Cambia a la URL de tu página si es necesario

if __name__ == '__main__':
    # Inicia un temporizador para abrir la página en el navegador después de que el servidor se haya iniciado
    Timer(1, abrir_pagina).start()  # 1 segundo de espera antes de abrir la página
    app.run(debug=True)
