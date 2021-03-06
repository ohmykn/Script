<?php
require_once('../wp-config.php');
$db_resualt = array ();

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf8");
}
$tablename_option=$table_prefix."options";

$sql = "SELECT option_name,option_value FROM ". $tablename_option ." WHERE option_name = 'home' OR option_name = 'siteurl'";
if ($result = $mysqli->query($sql)) {
    // 連想配列を取得
    while ($row = $result->fetch_assoc()) {
      $db_resualt[$row["option_name"]] = $row["option_value"] ;
    }
    // 結果セットを閉じる
    $result->close();
}

// DB接続を閉じる
$mysqli->close();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Https automatic setting tool for wordpress.Frontend is Bootstrap">
    <meta name="author" content="Wang G.N.">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Https automatic setting tool for wordpress</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
        <span class="fs-4">Https automatic setting tool for wordpress (Sample)</span>
      </a>
    </div>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Https automatic setting tool for wordpress</h1>
      <p class="fs-5 text-muted">Edit the database value</p>
    </div>
  </header>

  <main>
    <h2 class="display-6 text-center mb-4">Check List</h2>

    <div class="table-responsive">
      <table class="table text-left">
        <thead>
          <tr>
            <th style="width: 35%;"></th>
            <th style="width: 50%;">Contents</th>
            <th style="width: 15%;">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="text-start">home</th>
            <td><?php echo $db_resualt['home']; ?></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">siteurl</th>
            <td><?php echo $db_resualt['siteurl']; ?></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
        </tbody>

        <tbody>
          <tr>
            <th scope="row" class="text-start">Encryption</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
        </tbody>
      </table>
    </div>
    <h2 class="display-6 text-center mb-4">Switch</h2>
    <form action="config.php" method="post">
    <div class="row row-cols-1 row-cols-md-2 mb-2 text-center">

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">

          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">HTTP</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Switch to HTTP</li>
              <li>Switch to HTTP</li>
              <li>Switch to HTTP</li>
              <li>Switch to HTTP</li>
            </ul>
            <button type="submit" class="w-100 btn btn-lg btn-outline-primary" name="protocol" value="http">Back to HTTP</button>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal">HTTPS</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Switch to HTTPS</li>
              <li>Switch to HTTPS</li>
              <li>Switch to HTTPS</li>
              <li>Switch to HTTPS</li>
            </ul>
            <button type="submit" class="w-100 btn btn-lg btn-primary" name="protocol" value="https">Go HTTPS</button>
          </div>
        </div>
      </div>

    </div>

    </form>
    
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="assets/brand/bootstrap-logo.svg" alt="" width="24" height="19">
        <small class="d-block mb-3 text-muted">&copy; 2017–2022</small>
      </div>
  </footer>
</div>


    
  </body>
</html>
