<?php

namespace App;

class Utils
{
    //
    public static function IndonesianDate($date){
        if ($date != null){
            $month = array (
                1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
              );
            $split = explode('-', $date);
            
            return $split[2] . ' ' . $month[ (int)$split[1] ] . ' ' . $split[0];
        }
        return $date;
    }
}
