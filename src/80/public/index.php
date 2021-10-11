<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WSC2022</title>

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <!-- CSS Reset -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <!-- Milligram CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
  <style>
    html {
      font-size: 8px;
    }

    body {
      padding: 15px;
    }

    section {
      padding-bottom: 20px;
      margin-bottom: 20px;
      border-bottom: 1px solid lightgray;
    }

  </style>
</head>
<body>
  <?php $host = $_SERVER["HTTP_HOST"] ?>
  <?php $uri = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $host ?>

  <section>
    <h2>Debug</h2>
    <p><a href="<?php echo $uri ?>:8080">phpMyAdmin</a><br> root / 55******Gp<br>
    <p><a href="<?php echo $uri ?>/error.log">Error Log</a> / <a href="<?php echo $uri ?>/access.log">Access Log</a></p>
  </section>

  <section>
    <h3>Website</h3>
    <?php for ($i=1; $i<=15; $i++) : ?>
      <?php $port = 80 . str_pad($i, 2, 0, STR_PAD_LEFT) ?>
      <?php $url = $uri . ':' . $port ?>
      <p><a href="<?php echo $url ?>"><?php echo $url ?></a></p>
    <?php endfor; ?>
  </section>

  <section>
    <h2>DB</h2>
    <h3>Internal</h3>
    <p>host: db / port: 3306 / user: root / pass: 55******Gp</p>
    <h3>External</h3>
    <p>host: <?php echo $host ?> / port: 33306 / user: root / pass: 55******Gp</p>
  </section>

  <section>
    <h2>SFTP(SSH)</h2>
    <p>host: <?php echo $host ?> / port: 2022 / user: root / ssh-key: wsc2022 / remote-dir: /var/www/html/</p>
  </section>

  <section>
    <h2>SSH Commands</h2>
    <blockquote style="white-space: pre-line">// SSH
      $ ssh -p 2022 -i ./ssh_key/wsc2022 root@<?php echo $host ?> 

      // Laravel Project
      $ cd /var/www/html/8001
      $ composer create-project "laravel/laravel=~8.0" --prefer-dist laravelapp
      $ shopt -s dotglob && mv ./laravelapp/* ./
      $ chmod -R 777 ./storage
      $ php artisan migrate # .envのDB設定を変更しておく

      // Composer Install
      $ cd /var/www/html/8001
      $ composer install 
    </blockquote>

  </section>
</body>
</html>
