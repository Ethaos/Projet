<?php


class ClientBD{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getClient(){
        $query = "select * from jvuser";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new Jeux($d);
        }
        return $_data;
    }
}