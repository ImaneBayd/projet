<?php

class Classe {
    private $id;
    private $code;
    private $nom;
    private $id_fil;
    function __construct($id, $code, $nom, $id_fil) {
        $this->id = $id;
        $this->code = $code;
        $this->nom = $nom;
        $this->id_fil = $id_fil;
    }
     function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getNom() {
        return $this->nom;
    }
     function getId_fil() {
        return $this->id_fil;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($code) {
        $this->code = $code;
    }
    function setNom($nom) {
        $this->nom = $nom;
    }
    function setId_fil($id_fil) {
        $this->libelle = $id_fil;
    }
}