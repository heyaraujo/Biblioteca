<?php
class Util {
    public static function limpeza($dado){
        $dado = htmlspecialchars($dado);
        $dado = trim($dado);
        $dado = stripslashes($dado);

        return $dado;
    }
}
