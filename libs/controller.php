<?php
/*controlador base por el cual todos los otros 
 controladores van a estar heredando*/
class Controller{
    function __construct(){
        $this->view = new View();
    }
    
    //se encarga de cargar el archivo del modelo de mi controlador asociado
    function loadModel($model){
        //busca el modelo por la url
        $url = 'models/'.$model.'model.php';
        //valida si existe el archivo modelo y lo inicializa
        if(file_exists($url)){
            require_once $url;
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    //permitira que cuando reciva parametros para meter a la base de datos
    //en lugar de poner isset post simplifique eso
    function existPOST($params){
        //params es un arreglo el cual me perimite validar todos los parametros que existan en el metodo post 
        foreach($params as $param){
            if(!isset($_POST[$param])){
                return false;
            }
        }
        return true;
    }
    //lo mismo pero en lugar de revisar pos por revisa por get
    function existGET($params){
        foreach($params as $param){
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }
    function getGet($name){
        return $_GET[$name];
    }
    function getPost($name){
        return $_POST[$name];
    }

    //esta funcion se utiliza cuando exista un error o un caso de exito me cargue los mensajes de exito o error en la vista
    function redirect($route, $mensajes){
        $data =[];
        $params = '';
        foreach($mensajes as $key => $mensaje){
            array_push($data, $key.'='.$mensaje);
        }
        $params =join('&', $data);
        if($params != ''){
            $params = '?'. $params; 
        }
        header('Location: '. constant('URL') . '/'. $route.$params);
    }
}
