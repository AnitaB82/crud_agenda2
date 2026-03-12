<?php
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Contactos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 3px double #757474; padding: 8px; }
    th { background: #f5f5f5; text-align: left; }
    .top { display:flex; justify-content:space-between; align-items:center; text-shadow: 0px 2px 2px grey; }
    .danger { background:#c62828; color:#fff; border:0; padding:6px 10px; cursor:pointer; }
  </style>
</head>
<body>

  <div class="top">
    <h1>Agenda de Contactos</h1>
    <a href="index.php?action=create">+ Nuevo contacto</a>
  </div>

  <?php if (empty($contacts)): ?>
    <p>No hay contactos</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contacts as $c): ?>
          <tr>
            <td><?php echo (int)$c['id']; ?></td>
            <td><?php echo htmlspecialchars($c['name']); ?></td>
            <td><?php echo htmlspecialchars($c['email']); ?></td>
            <td><?php echo htmlspecialchars($c['phone']); ?></td>
            <td>
              <a href="index.php?action=edit&id=<?php echo (int)$c['id']; ?>">Editar</a>

              <form method="post"
                    action="index.php?action=destroy&id=<?php echo (int)$c['id']; ?>"
                    style="display:inline"
                    onsubmit="return confirm('¿Borrar este contacto?');">
                <button class="danger" type="submit">Borrar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</body>
</html>
