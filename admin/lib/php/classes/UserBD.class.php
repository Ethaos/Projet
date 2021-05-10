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

    public function upgradeClient($iduser){
        $query = "select upgradeClient(:iduser) as retour";
        $_resultset = $this->_db->prepare($query);
        $_resultset->bindValue(':iduser', $iduser);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new User($d);
        }
        //var_dump($_data);
        return $_data;
    }

    public function downgradeAdmin($iduser){
        $query = "select downgradeAdmin(:iduser) as retour";
        $_resultset = $this->_db->prepare($query);
        $_resultset->bindValue(':iduser', $iduser);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new User($d);
        }
        //var_dump($_data);
        return $_data;
    }

    public function inscription($nom,$prenom,$mail,$pwd){
        $query = "select inscription(:nom,:prenom,:mail,:password) as retour";
        $_resultset = $this->_db->prepare($query);
        $_resultset->bindValue(':nom', $nom);
        $_resultset->bindValue(':prenom', $prenom);
        $_resultset->bindValue(':mail', $mail);
        $_resultset->bindValue(':password', $pwd);
        $_resultset->execute();

        $retour = $_resultset->fetchColumn(0);
        //var_dump($retour);
        return $retour;
    }

    public function supprClient($id){
        $query = "select supprClient(:iduser) as retour";
        $_resultset = $this->_db->prepare($query);
        $_resultset->bindValue(':iduser', $id);
        $_resultset->execute();

        $retour = $_resultset->fetchColumn(0);
        //var_dump($retour);
        return $retour;
    }

    public function updateCli($champ,$id,$valeur){
        try{
            $query = "update jv_user set ".$champ."='".$valeur."'where iduser = '".$id."'";
            $_resultset = $this->_db->prepare($query);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function getClientByMail($mail){
        try{
            $query = "select * from jv_user where mail = :mail";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':mail',$mail);
            $_resultset->execute();
            $_data = $_resultset->fetch();
            //var_dump($_data);
            return $_data;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function getClientById($iduser){
        try {
            $this->_db->beginTransaction();
            $query = "select * from jv_user where iduser = :iduser";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':iduser', $iduser);
            $resultset->execute();
            $data = $resultset->fetch(PDO::FETCH_OBJ);
            return $data;
            //renvoyer un objet nécéssite adaptation dans ajax pour retour json
            // donc retourner objet simple, qui sera stocké dans un élément de tableau json


            $this->_db->commit();

        } catch(PDOException $e){
            print "Echec de la requête : ".$e->getMessage();
            $_db->rollback();
        }
    }

    public function getClientById2($iduser){
        try{
            $query = "select * from jv_user where iduser = :iduser";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':iduser',$iduser);
            $_resultset->execute();

            while($d = $_resultset->fetch()){
                $_data[] = new User($d);
            }
            //var_dump($_data);
            return $_data;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function updateMail($iduser,$mail){
        try{
            $query = "select modifmail(:iduser,:mail) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':iduser', $iduser);
            $_resultset->bindValue(':mail', $mail);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function updatePWD($iduser,$pwd){
        try{
            $query = "select modifmdp(:iduser,:password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':iduser', $iduser);
            $_resultset->bindValue(':password', md5($pwd));
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
}