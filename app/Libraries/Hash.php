<?php

namespace App\Libraries;

class Hash
{

    public static function encrypt($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public static function check($userpass, $dbpass)
    {
        if (password_verify($userpass, $dbpass)) {
            return true;
        } else {
            return false;
        }
    }
}
