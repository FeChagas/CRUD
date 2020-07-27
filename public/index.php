<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Just a CRUD</title>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/custom.css">
</head>
<body>

  <?php
  require '../kernel.php';

  use App\Core\Bootstrap;
  use App\Core\Database;   

  $app = new Bootstrap();
  ?>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>