<?php

class Validator {

    public function isRequired($field_array) {
        foreach ($field_array as $field) {
            if ($_POST['' . $field . ''] == '') {
                return FALSE;
            }
            return TRUE;
        }
    }

    public function isValidEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function isValidPassword($pw1, $pw2) {
        if($pw1 == $pw2) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
