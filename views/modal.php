<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Your modal code here -->
<dialog id="modal">
  <h2>Formulario de Registro</h2>
  <hr>
  <div class="modal-body">
    <form id="FrmAdd" enctype="multipart/form-data" method="post" onsubmit="handleSubmit(event)">
      <input type="text" class="form-control" id="user" name="user" placeholder="User Name" required>
      <br>
      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
      <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repite Password" required>
      <hr>
      <label for="FrmLevel">Level</label>
      <select multiple class="form-control" id="level" name="level" required>
        <option value="1">General</option>
        <option value="2">Administrator</option>
        <option value="3">Public</option>
      </select>
      <br>
      <label for="FrmFile" size="40" class="form-control">file input</label>
      <input type="file" class="form-control-file" id="FrmFile" name="FrmFile">
      <input type="hidden" id="table" name="table" value="users">
      <input type="submit" value="Registra">
    </form>
  </div>
  <button id="btn-cerrar-modal">Cerrar</button>
</dialog>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  document.getElementById('btn-cerrar-modal').addEventListener('click', () => {
    document.getElementById('modal').close();
  });

  async function handleSubmit(event) {
    event.preventDefault();

    const form = document.getElementById('FrmAdd');
    const formData = new FormData(form);

    try {
      const response = await fetch('./models/insert.php', {
        method: 'POST',
        body: formData
      });

      const result = await response.text();
      console.log(result);

      if (response.ok) {
        alert('Registro exitoso');
        form.reset();
        location.reload();
        document.getElementById('modal').close();
      } else {
        alert('Error al registrar');
      }
    } catch (error) {
      console.error('Error:', error);
      alert('Error al registrar');
    }
  }
</script>
</body>
</html>
