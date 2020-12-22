<?php
  ob_start();
  require_once("auth.php");
  require_once("config.php");

  $NIM = $_SESSION['nim'];
  var_dump($NIM);

