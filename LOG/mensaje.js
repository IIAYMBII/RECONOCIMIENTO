// script.js
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío normal del formulario

    const formData = new FormData(this);
    
    fetch('registro.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(text => {
        const successMessage = document.getElementById('successMessage');
        const messageText = document.getElementById('messageText');
        messageText.textContent = text;
        successMessage.style.display = 'block';

        // Ocultar el mensaje después de 3 segundos y luego refrescar la página
        setTimeout(() => {
            successMessage.style.display = 'none';
            location.reload(); // Refrescar la página
        }, 3000);
        
    })
    .catch(error => console.error('Error:', error));
});
