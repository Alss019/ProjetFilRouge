<?php
class Utilisateur
{

    // ATTRIBUTS
    private ?int $id_util;
    private ?string $nom_util;
    private ?string $prenom_util;
    private ?string $mail_util;
    private ?string $mdp_util;
    private ?string $tel_util;
    private ?bool $activ_util;
    private ?string $date_nais_util;
    private ?bool $valid_util;
    private ?string $token_util;
    private ?int $id_role;
    private ?int $id_club;
    private ?int $id_cat;
    private ?int $id_poste;

    //CONSTRUCTOR

    public function __construct(){}
    
    //GETTER 

    public function getId():?int{
        return $this->id_util;
    }
    public function getNom():?string{
        return $this->nom_util;
    }
    public function getPrenom():?string{
        return $this->prenom_util;
    }
    public function getMail():?string{
        return $this->mail_util;
    }
    public function getMdp():?string{
        return $this->mdp_util;
    }
    public function getTel():?string{
        return $this->tel_util;
    }
    public function getActiv():?bool{
        return $this->activ_util;
    }
    public function getDateNais():?string{
        return $this->date_nais_util;
    }
    public function getValide(): ?bool{
        return $this->valid_util;
    }
    public function getToken(): ?string{
        return $this->token_util;
    }
    public function getIdRole():?int{
        return $this->id_role;
    }
    public function getIdClub():?int{
        return $this->id_club;
    }
    public function getIdCat():?int{
        return $this->id_cat;
    }
    public function getIdPoste():?int{
        return $this->id_poste;
    }

    //SETTER

    public function setId(?int $id_util):void{
        $this->id_util = $id_util;
    }
    public function setNom(?string $nom_util):void{
        $this->nom_util = $nom_util;
    }
    public function setPrenom(?string $prenom_util):void{
        $this->prenom_util = $prenom_util;
    }
    public function setMail(?string $mail_util):void{
        $this->mail_util = $mail_util;
    }
    public function setMdp(?string $mdp_util):void{
        $this->mdp_util = $mdp_util;
    }
    public function setTel(?string $tel_util):void{
        $this->tel_util = $tel_util;
    }
    public function setActiv(?bool $activ_util):void{
        $this->activ_util = $activ_util;
    }
    public function setDateNais(?string $date_nais_util):void{
        $this->date_nais_util = $date_nais_util;
    }
    public function setValide(?bool $valid): void{
        $this->valid_util = $valid;
    }
    public function setToken(?string $token): void{
        $this->token_util = $token;
    }
    public function setIdRole(?int $id_role):void{
        $this->id_role = $id_role;
    }
    public function setIdClub(?int $id_club):void{
        $this->id_club = $id_club;
    }
    public function setIdCat(?int $id_cat):void{
        $this->id_cat = $id_cat;
    }
    public function setIdPoste(?int $id_poste):void{
        $this->id_poste = $id_poste;
    }
}