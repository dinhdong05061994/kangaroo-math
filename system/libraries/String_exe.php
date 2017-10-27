<?php

/**
 * @author minhhai
 * @copyright 2013
 */
class CI_String_exe{
    public function __construct() {
        
    }
    //Tach ma email
    public function seperate_emails_from_database($data) {
        $email[0] = "0000";
        $i = 0;
        $k = 0;
        $j = 0;
        while (isset($data[$i])){
            if ($data[$i] != '|'){
                $email[$k][$j] = $data[$i];
                $j++;
            } else {
                $j = 0;
                $k++;
            }
            $i++;
        }
        return $email;
    }
}

?>