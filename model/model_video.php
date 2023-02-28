<?php

class Video
{
    protected $id_video;
    protected $nom_video;
    protected $date_video;
    protected $url_video;
    protected $id_event;

    public function __construct($nom_video, $date_video, $url_video)
    {
        $this->nom_video = $nom_video;
        $this->date_video = $date_video;
        $this->url_video = $url_video;
    }

    //----------------//
    //-----GETTER-----//
    //----------------//

    public function getId(): int
    {
        return $this->id_video;
    }
    public function getNom(): string
    {
        return $this->nom_video;
    }
    public function getDate(): string
    {
        $this->date_video;
    }
    public function getUrl(): string
    {
        return $this->url_video;
    }
    public function getEvent(): string
    {
        return $this->id_event;
    }

    //----------------//
    //-----SETTER-----//
    //----------------//

    public function setId($id): void
    {
        $this->id_video = $id;
    }
    public function setNom($nom): void
    {
        $this->nom_video = $nom;
    }
    public function setDate($date): void
    {
        $this->date_video = $date;
    }
    public function setUrl($url): void
    {
        $this->url_video = $url;
    }
    public function setEvent($id_event): void
    {
        $this->id_event = $id_event;
    }

    //----------------//
    //----METHODES----//
    //----------------//
}
