<?php
require_once 'classes/session.php';
require_once 'models/usermodel.php';
class SessionController extends Controller{

    private $userSession;
    private $username;
    private $userid;

    private $session;
    private $sites;

    private $user;

    function __construct(){
        parent::__construct();
        $this->init();
    }

    //va a leer el archivo json que me permita definir como voy a dar los permisos
    //para dar autorizacion a los usuarios. 
    function init(){
        $this->session = new Session();

        $json = $this->getJSONFileConfig();

        $this->sites =$json['sites'];
        $this->defaultSites =$json['default-sites'];

        $this->validateSession();
    }
    //cargamos el archivo json y hay que decifrarlo
    private function getJSONFileConfig(){
        $string = file_get_contents('config/access.json');
        $json = json_decode($string, true);
        return $json;
    }
    //funcion para validar si existe sesion y vallidar si la pagina a la que quiere entrar es publica o privada
    //y si deacuerdo al rol puede ver la pagina
    public function validateSession(){
        error_log('SESSIONCONTROLLER::validateSession');
        if($this->existsSession()){
            $role = $this->getUserSessionData()->getRole();
            error_log("sessionController::validateSession(): username:" . $this->user->getUsername() . " - role: " . $this->user->getRole());
            if($this->isPublic()){
                $this->redirectDefaultSiteByRole($role);
                error_log( "SessionController::validateSession() => sitio público, redirige al main de cada rol" );
            }else {
                if($this->isAuthorized($role)){
                    error_log( "SessionController::validateSession() => autorizado, lo deja pasar" );
                }
                else {
                    error_log( "SessionController::validateSession() => no autorizado, redirige al main de cada rol" );
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        }else{
            if($this->isPublic()){
                error_log('SessionController::validateSession() public page');
                //lo deja entrar
            }else{
                error_log('SessionController::validateSession() redirect al login');
                header('Location: '. constant('URL'). '');
            }
        }
    }

    function existsSession(){
        if(!$this->session->exists()) return false;
        if($this->session->getCurrentUser() == NULL) return false;
        $userid = $this->session->getCurrentUser();
        if($userid) return true;
        return false;
    }
    //revisar por que no usa session->getCurrentUser
    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        $this ->user = new UserModel();
        $this->user->get($id);
        error_log("SESSIONCONTROLLER:: getUserSessionData->". $this->user->getUsername());
        error_log($this->user->getRole());
        return $this->user;
    }

    function isPublic(){
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for ($i=0; $i < sizeof($this->sites); $i++) { 
            if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public') {
                return true;
            }
        }
        return false;
    }

    function getCurrentPage(){
        $actialLink = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actialLink);
        error_log("SESSIONCONTROLLER::getCurrentPage->".$url[2]);
        return $url[2];
    }

    private function redirectDefaultSiteByRole($role){
        $url = '';
        for ($i=0; $i < sizeof($this->sites); $i++) { 
            if ($this->sites[$i]['role'] === $role) {
                //cambiar por que nuestra aplicacion no es de gastos
                $url = constant('URL') . '/'  .  $this->sites[$i]['site'];
                error_log($url);
                break;
            }
        }
        header('location:'. $url);
    }
    private function isAuthorized($role){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);
        for ($i=0; $i < sizeof($this->sites); $i++) { 
            if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $role) {
                return true;
            }
        }
        return false;
    }
    public function initialize($user){
        error_log("sessionController::initialize(): user: " . $user->getUsername());
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRole());
    }

    function authorizeAccess($role){
        switch ($role){
            case 'tutor':
                $this->redirect($this->defaultSites['tutor'],[]);
            break;
            case 'admin':
                $this->redirect($this->defaultSites['admin'],[]);
            break;
        }
    }
    function logout(){
        $this->session->closeSession();
    }
}
