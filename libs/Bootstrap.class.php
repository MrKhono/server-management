<?php 
    class Bootstrap{

        public function __construct()
        {
            //new Model();
            if (isset($_GET['url'])) {
                $url = explode('/',$_GET['url']);
                //echo $url[0];
                $controller = 'controller/'.$url[0].'Controller.php';
                if(file_exists($controller)) {

                    require_once $controller;
                    $controller_obj = new $url[0];
                    if (isset($url[2])) {
                        if (method_exists($controller_obj, $url[1])) {
                           $m = $url[1];
                            $controller_obj->$m($url[2]);
                        }else {
                            echo "La methode : ".$url[1]." n'existe pas ";
                        }
                    }elseif ($url[1]) {
                        if (method_exists($controller_obj, $url[1])) {
                            $m = $url[1];
                             $controller_obj->$m();
                         }else {
                             echo "La methode : ".$url[1]." n'existe pas ";
                         }
                    }else {
                        
                    }
                    echo "Le controller <b>".$url[0]."</b> existe !";
                }else{
                    echo "Le controller <b>".$url[0]."</b> n'existe pas !";
                }
            }
        }
    }
?>