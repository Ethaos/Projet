<?php

class JeuxBD extends Jeux {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getJeux(){
        $query = "select * from jv_jeux";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new Jeux($d);
        }
        //var_dump($_data);
        return $_data;
    }

    public function getJeuxById($idJeu){
        try{
            $query="select * from jv_jeux where idJeu = :idJeu";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idJeu',$idJeu);
            $_resultset->execute();

            while($d = $_resultset->fetch()){
                $_data[] = new Jeux($d);
            }
            //var_dump($_data);
            return $_data;
        }catch(PDOException $e){
            print 'Echec de la requete'.$e->getMessage();
        }
    }
}