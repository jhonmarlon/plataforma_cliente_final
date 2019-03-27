<?php

//VALIDANDO QUE NINGUN CAMPO SEA NULO
function isNull($email, $usuario, $contrasena, $conf_contrasena) {
    if (strlen(trim($email)) < 1 || strlen(trim($usuario)) < 1 ||
            strlen(trim($contrasena)) < 1 || strlen(trim($conf_contrasena)) < 1) {
        return true;
    } else {
        return false;
    }
}

//VALIDANDO CORREO VALIDO
function isMail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function validaPassword($var1, $var2) {
    if (strcmp($var1, $var2) !== 0) {
        return false;
    } else {
        return true;
    }
}

//ENCRIPTA CONTRASEÑA
function hashPassword($password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

function generateToken() {
    $gen = md5(uniqid(mt_rand(), false));
    return $gen;
}

function inNullLogin($email, $password) {
    if (strlen(trim($email)) < 1 || strlen(trim($password)) < 1) {
        return true;
    } else {
        return false;
    }
}

//Funcion para generar consecutivo tipo factura
function generate_numbers($start, $count, $digits) {
    $result = array();
    for ($n = $start; $n < $start + $count; $n++) {
        $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
    }
    return $result;
}
