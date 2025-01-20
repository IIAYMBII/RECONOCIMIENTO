import os
from flask import Flask, render_template, request, redirect, url_for, flash
import qrcode
import mysql.connector
import cv2
import face_recognition
import webbrowser
import threading

app = Flask(__name__)
app.secret_key = 'secret_key'

# Función para abrir el navegador automáticamente
def open_browser():
    webbrowser.open_new("http://127.0.0.1:8080/")

# Conexión a la base de datos
def get_db_connection():
    try:
        return mysql.connector.connect(
            host='localhost',
            user='root',
            password='',
            database='sistema_escolar'
        )
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return None

# Función para generar el código QR y guardarlo en 'static'
def generar_qr(data, filename):
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )
    qr.add_data(data)
    qr.make(fit=True)
    img = qr.make_image(fill='black', back_color='white')

    # Ruta completa para la carpeta 'static'
    qr_directory = 'static'
    
    # Crea el directorio 'static' si no existe
    
    
    # Guarda el QR directamente en la carpeta 'static'
    img.save(os.path.join(qr_directory, filename))

# Función para capturar el rostro (sin cambios)
def capturar_rostro():
    cap = cv2.VideoCapture(0)
    if not cap.isOpened():
        print("Error: No se pudo acceder a la cámara.")
        return None

    print("Por favor, mire a la cámara para capturar su rostro.")
    while True:
        ret, frame = cap.read()
        if not ret:
            print("Error al leer el cuadro de la cámara.")
            break

        cv2.imshow("Captura de Rostro", frame)

        # Presione 'c' para capturar el rostro
        if cv2.waitKey(1) & 0xFF == ord('c'):
            rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
            rostros_encodings = face_recognition.face_encodings(rgb_frame)
            if rostros_encodings:
                print("Rostro capturado con éxito.")
                cap.release()
                cv2.destroyAllWindows()
                return rostros_encodings[0]
            else:
                print("No se detectaron rostros. Intente de nuevo.")

        # Presione 'q' para cancelar
        if cv2.waitKey(1) & 0xFF == ord('q'):
            print("Captura cancelada.")
            break

    cap.release()
    cv2.destroyAllWindows()
    return None

# Rutas de la aplicación
@app.route('/')
def index():
    return render_template('index.html')

@app.route('/registrar', methods=['POST'])
def registrar_alumno():
    nombre_completo = request.form['nombre_completo']
    numero_control = request.form['numero_control']
    carrera = request.form['carrera']

    conn = get_db_connection()
    if not conn:
        flash("Error al conectar con la base de datos.", "error")
        return redirect(url_for('index'))

    cursor = conn.cursor()
    cursor.execute("SELECT * FROM registro_qr WHERE numero_control = %s", (numero_control,))
    alumno_existente = cursor.fetchone()

    if alumno_existente:
        flash("El número de control ya está registrado. Intenta con otro.", "error")
        return redirect(url_for('index'))

    if nombre_completo and numero_control and carrera:
        rostro_encoding = capturar_rostro()
        if rostro_encoding is None:
            flash("No se pudo capturar el rostro. Inténtalo nuevamente.", "error")
            return redirect(url_for('index'))

        cursor.execute("INSERT INTO registro_qr (nombre_completo, numero_control, carrera) VALUES (%s, %s, %s)", 
                       (nombre_completo, numero_control, carrera))
        conn.commit()
        alumno_id = cursor.lastrowid

        encoding_str = str(rostro_encoding.tolist())
        cursor.execute("UPDATE registro_qr SET rostro_encoding = %s WHERE id = %s", (encoding_str, alumno_id))
        conn.commit()

        # Crear el QR con los datos del alumno
        qr_data = f"Nombre: {nombre_completo}\nNumero de Control: {numero_control}\nCarrera: {carrera}"
        qr_filename = f"qr_{alumno_id}.png"
        generar_qr(qr_data, qr_filename)

        # Ruta completa del QR en la carpeta 'static'
        qr_path = os.path.join('static', qr_filename)

       
        # Guardar solo el nombre del archivo en la base de datos, no la ruta completa
        cursor.execute("UPDATE registro_qr SET qr_code_path = %s WHERE id = %s", (qr_filename, alumno_id))
        conn.commit()

        conn.close()

        flash("Alumno registrado exitosamente", "success")
        return redirect(url_for('listar_alumnos'))

    flash("Ocurrió un error en el registro. Inténtalo de nuevo.", "error")
    return redirect(url_for('index'))

# Ruta para listar los alumnos en una tabla
@app.route('/alumnos')
def listar_alumnos():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT id, nombre_completo, numero_control, carrera, qr_code_path FROM registro_qr")
    alumnos = cursor.fetchall()
    conn.close()
    return render_template('listar_alumnos.html', alumnos=alumnos)

# Ruta para editar un alumno
@app.route('/editar/<int:id>', methods=['GET', 'POST'])
def editar_alumno(id):
    if request.method == 'POST':
        nombre_completo = request.form['nombre_completo']
        numero_control = request.form['numero_control']
        carrera = request.form['carrera']

        conn = get_db_connection()
        cursor = conn.cursor()
        cursor.execute('UPDATE registro_qr SET nombre_completo = %s, numero_control = %s, carrera = %s WHERE id = %s',
                       (nombre_completo, numero_control, carrera, id))
        conn.commit()
        conn.close()

        flash("Alumno actualizado exitosamente", "success")
        return redirect(url_for('listar_alumnos'))
    else:
        conn = get_db_connection()
        cursor = conn.cursor()
        cursor.execute('SELECT * FROM registro_qr WHERE id = %s', (id,))
        alumno = cursor.fetchone()
        conn.close()
        return render_template('editar_alumno.html', alumno=alumno)

@app.route('/escanear')
def escaneo():
    return render_template('escaneo.html')

# Ruta para eliminar un alumno
@app.route('/eliminar/<int:id>')
def eliminar_alumno(id):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('DELETE FROM registro_qr WHERE id = %s', (id,))
    conn.commit()
    conn.close()
    flash("Alumno eliminado exitosamente", "success")
    return redirect(url_for('listar_alumnos'))


if __name__ == '__main__':
    threading.Timer(1, open_browser).start()
    app.run(debug=True, port=8080)  # Cambiado a puerto 8080
