<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists('components')) {

    $CI = get_instance();
    $CI->load->library(['session', 'encryption']);
    $CI->load->database();

    function encryptId($id) {
        $CI = get_instance();
        $CI->load->library(['encryption']);
        return base64_encode($CI->encryption->encrypt($id));
    }

    function decryptId($id) {
        $CI = get_instance();
        return $CI->encryption->decrypt(base64_decode($id));
    }
}