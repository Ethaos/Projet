<?php


class AdminBD extends Admin {
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;
    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getAdmin($login, $password){
        try {
            $query = "select isAdmin(:login,:password,true) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':login', $login);
            $_resultset->bindValue(':password', md5($password));
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }
}