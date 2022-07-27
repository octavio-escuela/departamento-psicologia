<?php

class Students extends SessionController{
    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        error_log('Student:: render -> carga la vista de students');
        $this->view->errorMessage = '';
        $this->view->render('students/index',[
            'user' => $this->user
        ]);
    }
    // function newStudent(){
    //     if($this->existPOST(['nombre','fecha','genero','lugar','domicilio', 'telefono', 'celular'])){

    //         $nombre = $this->getPost('nombre');
    //         $fecha = $this->getPost('fecha');
    //         $genero = $this->getPost('genero');
    //         $lugar = $this->getPost('lugar');
    //         $domicilio = $this->getPost('domicilio');
    //         $telefono = $this->getPost('telefono');
    //         $celular = $this->getPost('celular');

    //         error_log('Students->newStudent::'.$nombre);

    //         if($nombre == ''|| empty($nombre) || $fecha == '' || empty($fecha) || $genero == '' || empty($genero) || $lugar == '' || empty($lugar) || $domicilio == '' || empty($domicilio) || $telefono == ''|| empty($telefono) || $celular == '' || empty($celular)){
    //             $this->redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
    //         }else{
    //                 $user =new StudentModel();
                    
    //                 $user ->setName($nombre);
    //                 $user ->setFecha($fecha);
    //                 $user ->setGenero($genero);
    //                 $user ->setLugar($lugar);
    //                 $user ->setDomicilio($domicilio);
    //                 $user ->setPhone($telefono);
    //                 $user ->setCelular($celular);
    //             }
    //             if($user->save()){
    //                 $this->redirect('',['success' => SuccessMessages::SUCCESS_SIGNUP_NEWUSER]);
    //             }else{
    //                 $this-> redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
    //             }
    //     }else{
    //         $this-> redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
    //     }
    // }
    function newStudent(){
        print_r($_POST);
        error_log('Expenses::newExpense()');
        if(!$this->existPOST(['nombre','fecha','genero','lugar','domicilio', 'telefono', 'celular'])){
            $this->redirect('students', ['error' => ErrorMessages::ERROR_STUDENTS_NEWSTUDENT_EMPTY]);
            return;
        }

        if($this->user == NULL){
            $this->redirect('students', ['error' => ErrorMessages::ERROR_STUDENTS_NEWSTUDENT]);
            return;
        }

        $student = new StudentModel();

        $student ->setName($this->getPost('nombre'));
        $student ->setFecha($this->getPost('fecha'));
        $student ->setGenero($this->getPost('genero'));
        $student ->setLugar($this->getPost('lugar'));
        $student ->setDomicilio($this->getPost('domicilio'));
        $student ->setPhone($this->getPost('telefono'));
        $student ->setCelular($this->getPost('celular'));

        $student->save();
        $this->redirect('students', ['success' => SuccessMessages::SUCCESS_STUDENTS_NEWSTUDENT]);
    }
    function create(){
        // $categories = new StudentModel();
        $this->view->render('students/studentModal' 
            // "genero" => $categories->getAll(),
            // "user" => $this->user
        );
    } 
}
