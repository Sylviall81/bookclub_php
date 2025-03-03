<?php

/**
 * Sanitiza un campo eliminando espacios extra, etiquetas y caracteres especiales.
 */
function sanitizeInput($input) {
    // Primero, eliminas los espacios en blanco al principio y al final (trim)
    // Luego, eliminas las etiquetas HTML (strip_tags)
    // Y finalmente, aplicas htmlspecialchars para evitar problemas con caracteres especiales
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

/**
 * Valida que el email tenga un formato correcto.
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Valida que un campo tenga una longitud mínima.
 */
function validateMinLength($input, $length) {
    return strlen($input) >= $length;
}

/**
 * Valida que un campo solo contenga letras y espacios.
 */
function validateText($text) {
    return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $text);
}

/**
 * Valida que una contraseña tenga al menos 8 caracteres, incluyendo números y letras.
 */
function validatePassword($password) {
    return preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/", $password);
}

?>