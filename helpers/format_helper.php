<?php

function urlFormat($str) {
    $str = preg_replace('/\s*/', '', $str);
    $str = strtolower($str);
    $str = urlencode($str);
    return $str;
}

function format_date($date) {
    return date('F j, Y, g:i a ', strtotime($date));
}

function is_active($category) {
    if(isset($_GET['category'])) {
        if($_GET['category'] == $category) {
            return 'active';
        } else {
            return '';
        }
    } else {
        if($category == NULL) {
            return 'active';
        }
    }
}