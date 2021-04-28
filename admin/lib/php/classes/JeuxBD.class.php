<?php

class JeuxBD extends Jeux {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getJeux(){
        $query = "select * from jv_jeux order by idJeu";
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
            $query="select * from jv_jeux where idJeu=:idJeu";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idJeu',$idJeu);
            $_resultset->execute();

            while($d = $_resultset->fetch()){
                $_data[] = new Jeux($d);
            }
            //var_dump($_data);
            return $_data;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }

    public function updateJeu($champ,$id,$valeur){
        try{
            $query = "update jv_jeux set ".$champ."='".$valeur."'where idjeu = '".$id."'";
            $_resultset = $this->_db->prepare($query);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function ajoutJeu($nomJeu,$plateforme,$editeur,$anneesortie,$note){
        try{
            $query = "select ajoutJeu(:nomJeu,:plateforme,:editeur,:anneesortie,:note) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nomJeu',$nomJeu);
            $_resultset->bindValue(':plateforme',$plateforme);
            $_resultset->bindValue(':editeur',$editeur);
            $_resultset->bindValue(':anneesortie',$anneesortie);
            $_resultset->bindValue(':note',$note);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }

    public function getAjoutJeuAjax($nomJeu,$plateforme,$editeur,$anneesortie,$note){
        try{
            $query = "select ajoutJeu(:nomJeu,:plateforme,:editeur,:anneesortie,:note) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nomJeu',$nomJeu);
            $_resultset->bindValue(':plateforme',$plateforme);
            $_resultset->bindValue(':editeur',$editeur);
            $_resultset->bindValue(':anneesortie',$anneesortie);
            $_resultset->bindValue(':note',$note);
            $_resultset->execute();
            $data = $_resultset->fetch();
            //var_dump($data);
            return $data;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function getJeuByName($nomjeu){
        try{
            $query = "select * from jv_jeux where nomjeu = :nomjeu";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nomjeu',$nomjeu);
            $_resultset->execute();
            $data = $_resultset->fetch();
            //var_dump($data);
            return $data;
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function ajoutPhoto($id,$photo){
        try{
            $query = "select ajoutphoto(:id,:photo) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id',$id);
            $_resultset->bindValue(':photo',$photo);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }
}