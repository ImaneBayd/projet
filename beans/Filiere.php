<?php


class Filiere {
     private $id;
     private $code;
     private $libelle;
     private $abr;
     function __construct($id, $code, $libelle, $abr) {
        $this->id = $id;
        $this->code = $code;
        $this->libelle = $libelle;
        $this->abr = $abr;
    }
     function getId() {
         return $this->id;
     }

     function getCode() {
         return $this->code;
     }

     function getLibelle() {
         return $this->libelle;
     }

     function getAbr() {
         return $this->abr;
     }

     function setId($id) {
         $this->id = $id;
     }

     function setCode($code) {
         $this->code = $code;
     }

     function setLibelle($libelle) {
         $this->libelle = $libelle;
     }

     function setAbr($abr) {
         $this->abr = $abr;
     }


}
