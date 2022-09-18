<?php

class SuccessMessages{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    const SUCCESS_SIGNUP_NEWUSER       = "8281e04ed52ccfc13820d0f6acb0985a";
    const SUCCESS_STUDENTS_NEWSTUDENT  = "8281e04ed5g46jdh788sd87df7887sd7";
    const SUCCESS_PSYCHOLOGIST_DELETE  = "8281e04e5g46456hfd8sd87df745sdf4";
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            SuccessMessages::SUCCESS_SIGNUP_NEWUSER => "Usuario registrado correctamente",
            SuccessMessages::SUCCESS_STUDENTS_NEWSTUDENT => "Estudiante registrado correctamente",

            SuccessMessages::SUCCESS_PSYCHOLOGIST_DELETE => "Psicologo eliminado correctamente",

        ];
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>
