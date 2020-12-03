<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <link href="assets/css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>CDR Wiewer</title>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

<div class="navbar navbar-dark bg-dark nov-bar-container">

  <!-- <img class="my-0 mr-md-auto font-weight-normal" src="/img/logo.png" alt="" width="105" height="20"> -->
  <a class="navbar-brand my-0 mr-md-auto font-weight-normal" href="/">Audiocodes CDR <span class="colortext">Viewer</span> </a>
  <nav class="nav nav-inline">
    <a class="nav-link colortext " href="http://10.10.10.25/">Audiocodes</a>
    <a class="nav-link" href="http://172.16.4.209:3000/">Grafana</a>
    <a class="nav-link" href="http://10.10.10.4:48080/SBC_CDR/">HFS CDR</a>
  </nav>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-light" href="#"><?= $_SESSION['user']['full_name'] ?></a>
    <a class="p-2 text-light" href="#"><?= $_SESSION['user']['email'] ?></a>
    
  </nav>
  <a class="btn btn-light btn-sm " href="vendor/logout.php">Logout</a>
</div>






<script type="text/javascript" src="/assets/js/get_cdr_table.js"></script>
<script type="text/javascript" src="/assets/js/get_cdr_stat.js"></script>


<div class="form-row search-box">
    <div class="col-sm-2">
      <input id="phone_num" name="phone_num" type="text" placeholder="Phone Number" class="phone_num form-control delete col" />
    </div>
    <div class="colcol-sm-3">
      <button id="load"  class="btn btn-light dropdown col ">Search</button>
    </div>

      <div class="colcol-sm-3">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
Monthly
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item ajax-month-key" id="Jan" href="#">January</a>
      <a class="dropdown-item ajax-month-key" id="Feb" href="#">February</a>
      <a class="dropdown-item ajax-month-key" id="Mar" href="#">March</a>
      <a class="dropdown-item ajax-month-key" id="Apr" href="#">April</a>
      <a class="dropdown-item ajax-month-key" id="May" href="#">May</a>
      <a class="dropdown-item ajax-month-key" id="Jun" href="#">June</a>
      <a class="dropdown-item ajax-month-key" id="Jul" href="#">July</a>
      <a class="dropdown-item ajax-month-key" id="Aug" href="#">August</a>
      <a class="dropdown-item ajax-month-key" id="Sep" href="#">September</a>
      <a class="dropdown-item ajax-month-key" id="Oct" href="#">October</a>
      <a class="dropdown-item ajax-month-key" id="Nov" href="#">November</a>
      <a class="dropdown-item ajax-month-key" id="Dec" href="#">December</a>
    </div>
    </div>


    <!-- <div class="col">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
Location statistics
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" id="1" href="#">SE</a>
      <a class="dropdown-item" id="2" href="#">FI</a>
      <a class="dropdown-item" id="3" href="#">NO</a>
      <a class="dropdown-item" id="4" href="#">ES</a>
      <a class="dropdown-item" id="5" href="#">DE</a>
      <a class="dropdown-item" id="6" href="#">BG</a>
    </div>
    </div> -->

    <!-- <div class="col">
      <button id="satat"  class="btn btn-light col ">Statistics</button>
    </div> -->
    <div class="col ">
      <button id="clear" class="clear btn btn-secondary ">Clear</button>
      </div>

    <hr>

</div>



<div class="table-container " id="information" > </div>




</body>
</html>
