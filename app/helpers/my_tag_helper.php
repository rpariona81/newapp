<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Helper que da formato a los errores.
 * */
if (!function_exists('my_validation_errors')) {

    function my_validation_errors($errors) {
        $salida = '';
        if ($errors) {
            $salida = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            $salida = $salida .'<h5 class="alert-heading">Mensajes de validación</h5>';
            $salida = $salida . '<small>' . $errors . '</small>';
            $salida = $salida .'  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        return $salida;
    }

}

if (!function_exists('my_error')) {

    function my_error($error) {
        $salida = '';
        if ($error) {
            $salida = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            $salida = $salida . '<strong>' . $error . '</strong>';
            $salida = $salida .'  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        return $salida;
    }

}
