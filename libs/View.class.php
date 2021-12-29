<?php  

    class View{

        public function __construct(){

        }

        public function load() {
          $num = func_num_args();
          $args = func_get_args();
          switch ($num) {
            case 1:
                $this->charger($args[0]);
                break;
            case 2:
                $this->charger($args[0], $args[1]);
                break;
          }
        }

        private function charger($page, $data = array()){

            $data = $data;
            $page = 'view/'.$page;
            if (file_exists($page)) {
                require_once $page;
            }else {
                echo "La view ".$page." n'existe pas !"; 
            }
            
        }
    }