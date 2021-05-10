<?php

class JeuxBD extends Jeux {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    // GETTERS

    public function getJeux(){
        try{
            $query = "select * from jv_jeux order by idJeu";
            $_resultset = $this->_db->prepare($query);
            $_resultset->execute();

            while($d = $_resultset->fetch()){
                $_data[] = new Jeux($d);
            }
            if($_data[0]==null){
                print 'VIDE !';
            }
            //var_dump($_data);
            return $_data;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
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

    //CRUD

    public function ajoutJeu($nomjeu,$plateforme,$editeur,$anneesortie,$note,$encodeur){
        try{
            $query = "select ajoutJeu(:nomjeu,:plateforme,:editeur,:anneesortie,:note,:encodeur) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nomjeu',$nomjeu);
            $_resultset->bindValue(':plateforme',$plateforme);
            $_resultset->bindValue(':editeur',$editeur);
            $_resultset->bindValue(':anneesortie',$anneesortie);
            $_resultset->bindValue(':note',$note);
            $_resultset->bindValue(':encodeur',$encodeur);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }

    public function updateJeu($champ,$id,$valeur){
        try{
            $query = "select modifjeu(:id,:champ,:valeur) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id',$id);
            $_resultset->bindValue(':champ',$champ);
            $_resultset->bindValue(':valeur',$valeur);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function updateNote($id,$N){
        try{
            $query = "update jv_jeux set note ='".$N."'where idjeu = '".$id."'";
            $_resultset = $this->_db->prepare($query);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function supprJeu($id){
        try{
            $query = "select supprJeu(:idjeu) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idjeu',$id);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function ajoutPhoto($id,$photo){
        try{
            $query = "select ajoutphoto(:idjeu,:photo) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idjeu',$id);
            $_resultset->bindValue(':photo',$photo);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }
}