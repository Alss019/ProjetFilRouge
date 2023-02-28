<?php

class TypeEvenement
{

    protected $id_type_event;
    protected $nom_type_event;

    public function __construct($nom_type_event)
    {
        $this->nom_type_event = $nom_type_event;
    }

    //----------------//
    //-----GETTER-----//
    //----------------//

    public function getIdTypeEvent(): int
    {
        return $this->id_type_event;
    }
    public function getNom(): string
    {
        return $this->nom_type_event;
    }


    //----------------//
    //-----SETTER-----//
    //----------------//

    public function setId($id): void
    {
        $this->id_type_event = $id;
    }
    public function setNom($nom): void
    {
        $this->nom_type_event = $nom;
    }

    public function allTypeEvent($bdd): array
    {
        try {
            $req = $bdd->prepare('SELECT * FROM type_evenement');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function typeEventById($bdd): array
    {
        try {
            $req = $bdd->prepare('SELECT * FROM type_evenement
            WHERE id_type_event = :id_type_event');
            $req->execute(array('id_type_event' => $this->getIdTypeEvent()));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
}
