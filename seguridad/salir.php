<?php


session_start();
//vaciamos la sesion
session_unset();
//eliminamos la sesion
session_destroy();
header("Location: ../index.php");
