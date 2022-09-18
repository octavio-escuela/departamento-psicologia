<?php

class ErrorMessages{
    //por cada error que queramos mostrar seguiremos esta estructura
    const ERROR_LOGIN_AUTHENTICATE = "11c37cfab311fbe28652f4947a9523c4";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY = "2194ac064912be67fc164539dc435a42";
    const ERROR_LOGIN_AUTHENTICATE_DATA = "bcbe63ed8464684af6945ad8a89f76f8";
    const ERROR_SIGNUP_NEWUSER = "1fdce6bbf47d6b26a9cd809ea1910222";
    const ERROR_SIGNUP_NEWUSER_EMPTY = "a5bcd7089d83f45e17e989fbc86003ed";
    const ERROR_SIGNUP_NEWUSER_EXISTS = "a74accfd26e06d012266810952678cf3";
    CONST ERROR_STUDENTS_NEWSTUDENT_EMPTY = "445accf645765d012266810952675675";
    CONST ERROR_STUDENTS_NEWSTUDENT = "445accf645DSF56SD67FG609526GSDH4";
    CONST ERROR_FILES_MISSING_DATA = "3b232b94f729dd9f77953634c90834f0";
    CONST ERROR_FILES_FAILED_INSERT_QUERY = "dfa7a1fbfc33c2020c21797a3f11a1e1";

    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE => 'Hubo un problema al autenticarse',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY => 'Llena los campos de usuario y contraseña',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA => 'Nombre de usuario y/o password incorrectos',
            ErrorMessages::ERROR_SIGNUP_NEWUSER => 'Hubo un error al intentar registrarte. Intenta de nuevo',
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY => 'Los campos no pueden estar vacíos',
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS => 'El nombre de usuario ya existe, selecciona otro',
            ErrorMessages::ERROR_STUDENTS_NEWSTUDENT_EMPTY => 'Los datos del estudiante no pueden estar vacios',
            ErrorMessages::ERROR_STUDENTS_NEWSTUDENT => 'Ocurrio un error el estudiante no pudo ser guardado',
            ErrorMessages::ERROR_FILES_MISSING_DATA => 'Hacen falta alguno de los datos para completar la operación',
            ErrorMessages::ERROR_FILES_FAILED_INSERT_QUERY 
                => 'Ocurrió un error al tratar de guardar los datos en la base de datos'
        ];
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>
