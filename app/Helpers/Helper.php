<?php

namespace App\Helpers;



class Helper
{
    public static function IDGenerator($model,$trow,$length = 8, $prefix,$date)
    {
       $data = $model::orderBy('id','desc')->first();
        if(!$data)
        {
            $data_length = $length;
            $last_number_length='';
        }
        else
        {
            $code_data=substr($data->$trow,strlen($prefix)+1);
            $data_last_number=($code_data/1)*1;
            $increment_last_number=$data_last_number+1;
            $last_number_length=strlen($increment_last_number);
            $data_length=$length-$last_number_length;
            $last_number_length=$increment_last_number;
            
        }
        $datamer="";
        for($i=0;$i<$data_length;$i++)
        {
            $datamer.=0;
        }
        return $prefix.'-'.$datamer.$last_number_length;
     
        
    }
    
}
