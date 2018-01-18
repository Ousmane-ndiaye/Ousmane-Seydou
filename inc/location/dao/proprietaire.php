<?php

namespace location\dao;
use \PDO;
    class Proprietaire
    {
        var $numCNI;
        var $nom;
        var $tel;
        private $bdd;

        private function getConnexion()
        {
            try
            {
                if($this->bdd == null)
                {
                    $this->bdd = new PDO('mysql:host=;dbname=BDLocation;charset=utf8', 'root', '@umones',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
        }
        public function add($_numCNI, $_nom, $_tel)
        {
            $this->getConnexion();
            $sql = "INSERT INTO PROPRIETAIRE VALUES(null,:numCNI, :nom, :tel)";
            $req = $this->bdd->prepare($sql);
            if(isset($_numCNI) && isset($_nom) && isset($_tel))
            {
                $data = $req->execute(array(
                    'numCNI'=>$_numCNI,
                    'nom'=>$_nom,
                    'tel'=>$_tel
                ));
                return $data;
            }
            else
            {
                $data = $req->execute(array(
                    'numCNI'=>$this->numCNI,
                    'nom'=>$this->nom,
                    'tel'=>$this->tel
                ));
                return $data;
            }
        }
        public function find($nCNI)
        {
            $this->getConnexion();
            $sql = "SELECT * FROM PROPRIETAIRE WHERE numCNI ='".$nCNI."' ";
            $donnees = $this->bdd->query($sql);
            return $donnees;
        }
    }
?>