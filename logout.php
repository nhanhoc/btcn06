<?php
  require_once 'init.php';
  require_once 'funcion.php';
  //xử lý logic
  unset($_SESSION['userId']);
  header('Location: index');  