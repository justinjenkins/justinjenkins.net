<?php

namespace app\extensions\helper;

class Dates extends \lithium\template\Helper {

        public function age($birthday,$format="%y") {

                $today = new \DateTime('now'); 
                $age = $birthday->diff($today); 

                return $age->format($format);

        }
}

?>
