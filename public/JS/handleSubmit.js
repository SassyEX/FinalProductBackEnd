document.getElementById('btn-cerrar-modal').addEventListener('click', () => {
  document.getElementById('modal').close();
});

async function handleSubmit(event) {
  event.preventDefault();
  
  const form = document.getElementById('FrmAdd');
  const formData = new FormData(form);
  
  try {
    const response = await fetch('../models/insertsql.php', {
      method: 'POST',
      body: formData
    });
    
    const result = await response.text();
    console.log(result);

    if (response.ok) {
      alert('Registro exitoso');
      form.reset();
      document.getElementById('modal').close();
    } else {
      alert('Error al registrar');
    }
  } catch (error) {
    console.error('Error:', error);
    alert('Error al registrar');
  }
}
