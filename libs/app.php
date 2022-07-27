<?php
require_once 'controllers/errores.php';
// esta clase se encarga de centralizar toda la aplicacion y de routera todos los controladores que nosotros especifiquemos por la url
class App{
    function __construct(){
        //en la variable url se guarda la url si existe si no existe entonces se guarda null
        $url = isset($_GET['url']) ? $_GET['url'] : null ?? ""; 
        //la idea es recortar la url para tener control sobre los parametros de la url
        //rtrim sirve para eliminar las diagonales al final de la cadena
        $url = rtrim($url,'/');
        //explode divide un string en varios string y regresa un arreglo
        $url = explode('/', $url);

        //la url puede estar dividida en varias partes.
        //en el caso de que la url no tenga un controlador entonces me redigira a la pagina de login
        if(empty($url[0])){
            //se carga el controlador de login
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            //se crea una nueva instacia del controlador login
            $controller = new Login();
            //se carga el modelo login
            $controller->loadModel('login');
            //se renderiza la vista
            $controller->render();
            return false;
        }

        //en caso de que la url si especifique un controlador
        //primero se guarda la ruta donde esta el controlador
        $archivoController = 'controllers/'.$url[0].'.php';
        //despues se valida si existe dicho controlador en la ruta especificada
        if (file_exists($archivoController)) {
            //en caso de que si exista entonces se incluye el archivo para poder instanciarlo
            require_once $archivoController;
            //se instancia el controlador especificado
            $controller=new $url[0];
            //se carga el modelo del controlador
            $controller->loadModel($url[0]);
            //valida si existe un segundo parametro en la url
            if (isset($url[1])) {
                //valida si ese segundo parametro de la url es un metodo del controlador especificado
                if(method_exists($controller, $url[1])){
                    //busca en la url si existe un tercer parametro
                    if(isset($url[2])){
                        //en el caso de existir entonces cuenta cuantos parametros hay en la url sin contar el de los controladores y el de los metodos por eso se le resta 2 al numero de elementos del arreglo
                        $nparam = count($url) - 2;
                        //se crea un arreglo conde se guardaran los parametros
                        $params =[];
                        //se hace una iteracion para guardar los parametros en el arreglo a partir de la 3ra psicion ya que esos 2 primeros campos estan destidados a controladores y metodos
                        for ($i=0; $i < $nparam; $i++) { 
                            array_push($params, $url[$i+2]);
                        }
                        //se invoca el metodo con los parametros entontrados
                        $controller->{$url[1]}($params);
                    }else {
                        //en caso de no tener parametros adicionales ademas de controladores y metodos solo se invoca el metodo sin parametros
                        $controller->{$url[1]}();
                    }
                }
                else {
                    $controller = new Errores();
                }
            } else {
                //en caso de no exista segundo parametro en la url
                //se carga el metodo por default

                error_log("APP:: render");
                $controller->render();
            }
        }else {
            # //mada un error 404 
            $controller = new Errores();
        }

    }
}