<?php

    class getinst{
        
        static function getinst():mixed{
            return self::getParam();

            // return self::$API = (!(self::$API instanceof self))?
            //                     new Api($arg)
            //                     : self::$API;
        }
        static function getParam():mixed{
            $Param = json_decode(file_get_contents("config.json"), true)[get_class()][__FUNCTION__]['Param_Opcionales'];
            $arg = (func_num_args()!=0) ? (object) func_get_args()[0]: new stdClass();
            foreach ($Param as $key => $value) {
                if(isset($arg->{$key})) continue;
                else $arg->{$key} = $value;
            }
            return $arg;
        }
    }
    $obj = new getinst();
    print_r($obj->getinst());



?>