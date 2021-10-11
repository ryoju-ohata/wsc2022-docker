<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php $host = $_SERVER["HTTP_HOST"] ?>
  <?php $uri = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $host ?>

  <p><a href="<?php echo $uri ?>:8080">phpMyAdmin</a><br>
  内部接続 host: db / port: 3306 / user: root / pass: 55******Gp<br>
  外部接続 host: <?php echo $host ?> / port: 33306 / user: root / pass: 55******Gp</p>
  <p><a href="<?php echo $uri ?>/error.log">Error Log</a></p>
  <p><a href="<?php echo $uri ?>/access.log">Access Log</a></p>
  <?php for ($i=1; $i<=15; $i++) : ?>
    <?php $port = 80 . str_pad($i, 2, 0, STR_PAD_LEFT) ?>
    <?php $url = $uri . ':' . $port ?>
    <p><a href="<?php echo $url ?>"><?php echo $url ?></a></p>
  <?php endfor; ?>
  <div style="white-space: pre-line">
    // SSH
    $ ssh -p 2022 -i ./ssh_key/wsc2022 root@<?php echo $host ?>


    // Laravel Project
    $ cd /var/www/html/8001
    $ composer create-project "laravel/laravel=~8.0" --prefer-dist laravelapp
    $ php artisan migrate

    // Composer Install
    $ cd /var/www/html/8001
    $ composer install 
  </div>
</body>
</html>
