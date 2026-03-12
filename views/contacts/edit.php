<?php if (!empty($errors)): ?>
  <ul style="color:red;">
    <?php foreach ($errors as $e): ?>
      <li><?= htmlspecialchars($e) ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php
$old = $old ?? [];
$errors = $errors ?? [];


function val(string $key, array $contact, array $old): string
{
  if (isset($old[$key])) return (string)$old[$key];
  return (string)($contact[$key] ?? '');
}
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Editar contacto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 24px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input {
      width: 320px;
      padding: 8px;
    }

    .error {
      color: #c62828;
      font-size: 14px;
    }

    button {
      margin-top: 12px;
      padding: 8px 12px;
    }
  </style>
</head>

<body>

  <p><a href="index.php?action=index">← Volver</a></p>
  <h1>Editar contacto #<?php echo (int)$contact['id']; ?></h1>

  <form method="post" action="index.php?action=update&id=<?php echo (int)$contact['id']; ?>">
    <label>
      Nombre
      <input name="name" value="<?php echo htmlspecialchars(val('name', $contact, $old)); ?>">
      <?php if (isset($errors['name'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['name']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Email
      <input name="email" value="<?php echo htmlspecialchars(val('email', $contact, $old)); ?>">
      <?php if (isset($errors['email'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['email']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Teléfono
      <input name="phone" value="<?php echo htmlspecialchars(val('phone', $contact, $old)); ?>">
      <?php if (isset($errors['phone'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['phone']); ?></div>
      <?php endif; ?>
    </label>

    <button type="submit">Guardar</button>
  </form>

</body>

</html>