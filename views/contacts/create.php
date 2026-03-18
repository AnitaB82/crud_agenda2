<?php
 if(!empty($errors)): ?>
    <ul style="color:red;">
    <?php foreach($errors as $e): ?>
        <li><?= htmlspecialchars($e) ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php
$old = $old ?? [];
$errors = $errors ?? [];
?>


<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nuevo contacto Actualizado</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    label { display:block; margin-top: 10px; }
    input { width: 320px; padding: 8px; }
    .error { color:#c62828; font-size:14px; }
    button { margin-top: 12px; padding:8px 12px; }
  </style>
</head>
<body>

  <p><a href="index.php?action=index">← Volver</a></p>
<h2>Nuevo contacto</h2>

<form method="POST" action="index.php?action=store">
    <label>Nombre</label>
    <input type="text" name="name" required><br>
    <label>Email</label>
    <input type="email" name="email" required><br>
    <label>Teléfono</label>
    <input type="text" name="phone" required><br>
    <button type="submit">Guardar</button>
</form>

<a href="index.php">Volver</a>

</body>
</html>
