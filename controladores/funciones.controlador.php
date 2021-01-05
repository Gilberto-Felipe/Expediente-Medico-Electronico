<?php 

class ControladorFunciones {

    static public function ctrValidar($data) {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

}