<?php


class Connexion{

    private static $_instance = null;

    public static function getInstance($dsn,$user,$password){
        // :: maniere d'atteindre la variable statique
        if(!self::$_instance){
            //si l'instance de connexion n'existe pas encore
            try{
                //on essaie d'instancier un objet de connexion (PDO) <---librairie PDO
                self::$_instance = new PDO($dsn,$user,$password);
                //print "Connecté";
            } catch(PDOException $e){
                print "Echec : ".$e->getMessage();
            }
        }
        return self::$_instance;
    }
}