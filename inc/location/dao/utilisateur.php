<?php

namespace location\dao;
    use \PDO;
    class Utilisateur
    {
        var $nomComplet;
        var $login;
        var $password;
        var $profil;
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
        public function add() //------------------------------------------Ajouter un utilisateur
        {
            $this->getConnexion();
            $sql = "INSERT INTO UTILISATEUR VALUES(null, :nomComplet, :login, :password, :profil, :etat)";
            $req = $this->bdd->prepare($sql);
            $data = $req->execute(array(
                'nomComplet'=>$this->nomComplet,
                'login'=>$this->login,
                'password'=>$this->password,
                'profil'=>$this->profil,
                'etat'=>'-1'
            ));
            return $data;
        }
        public function listUser() //----------------------------------------Lister les utilisateurs
        {
            $this->getConnexion();
            $sql = "SELECT * FROM UTILISATEUR";
            $donnees = $this->bdd->query($sql);
            return $donnees;
        }
        public function actDesact($nCNI,$netat) //---------------------------Activer ou desactiver un utilisateur
        {
            $this->getConnexion();
            if($netat == 0)
            {
                $sql = "UPDATE UTILISATEUR SET etat = '".$netat."' WHERE numCNI = '".$nCNI."' ";
                $data = $this->bdd->exec($sql);
                return $data;
            }
            elseif ($netat == 1)
            {
                $sql = "UPDATE UTILISATEUR SET etat = '".$netat."' WHERE numCNI = '".$nCNI."' ";
                $data = $this->bdd->exec($sql);
                return $data;
            }
        }
        public function logOn($logTest, $pwdTest, $propTest) //-----------------------------Loger un utilisateur
        {
            $this->getConnexion();
            $sql = "SELECT * FROM UTILISATEUR WHERE login ='".$logTest."' AND password = '".$pwdTest."' AND profil ='".$propTest."'";
            $donnees = $this->bdd->query($sql);
            return $donnees;
        }
        public function changePassword($nCNi, $newPwd)  //--------------------------------Changer le mot de passe d'un utilisateur
        {
            $this->getConnexion();
            $sql = "UPDATE UTILISATEUR SET password = '".$newPwd."' WHERE numCNI = '".$nCNi."' ";
                $data = $this->bdd->exec($sql);
                return $data;
        }
        public function find($logTest)
        {
            $this->getConnexion();
            $sql = "SELECT * FROM UTILISATEUR WHERE login ='".$logTest."' ";
            $donnees = $this->bdd->query($sql);
            return $donnees;
        }
    }
?>