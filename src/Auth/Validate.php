<?php

namespace ElseifAB\IDKollen\Auth;

class Validate
{

    public static function socialSecurityNumber($param)
    {
        if (preg_match("/^(19|20)?[0-9]{6}[- ]?[0-9]{4}$/", $param)) {
            return true;
        }
        return false;
    }

}
