<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php $uri = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") .  $_SERVER["HTTP_HOST"] ?>
  <p><a href="<?php echo $uri ?>:8080">phpMyAdmin</a>: root/root</p>
  <p><a href="<?php echo $uri ?>/error.log">Error Log</a></p>
  <p><a href="<?php echo $uri ?>/access.log">Access Log</a></p>
  <?php for ($i=1; $i<=15; $i++) : ?>
    <?php $port = 80 . str_pad($i, 2, 0, STR_PAD_LEFT) ?>
    <?php $url = $uri . ':' . $port ?>
    <p><a href="<?php echo $url ?>"><?php echo $url ?></a></p>
  <?php endfor; ?>
</body>
</html>