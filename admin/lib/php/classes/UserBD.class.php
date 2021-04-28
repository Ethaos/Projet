<?php


class UserBD extends User {
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;
    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getUser($login, $password){
        try {
            $query = "select isCreated(:login,:password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':login', $login);
            $_resultset->bindValue(':password', md5($password));
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }

    public function getClient(){
        $query = "select * from jv_user";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new User($d);
        }
        //var_dump($_data);
        return $_data;
    }

    public function getClientEntete($mail){
        $query = "select * from jv_user where mail = :mail";
        $_resultset = $this->_db->prepare($query);
        $_resultset->bindValue(':mail', $mail);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new User($d);
        }
        //var_dump($_data);
        return $_data;
    }
}