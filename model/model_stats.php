<?php

class StatIndividuel
{
private ?int $id_util;
private ?int $id_event;
private ?bool $presence;
private ?string $passe;
private ?string $passe_reussi;
private ?string $tirs;
private ?string $tirs_cadre;
private ?string $faute;
private ?string $carton_jaune;
private ?string $carton_rouge;
private ?string $tacle;
private ?string $tacle_reussi;
private ?string $but;
private ?string $passe_d;
private ?bool $blessure;
private ?string $minutes;
private ?string $poste;

    public function __construct(){}
        //----------------//
    //-----GETTER-----//
    //----------------//

    public function getIdUtil(): ?int
    {
        return $this->id_util;
    }
    public function getIdEvent(): ?int
    {
        return $this->id_event;
    }
    public function getPresence(): ?bool
    {
        return $this->presence;
    }
    public function getPasse(): ?string
    {
        return $this->passe;
    }
    public function getPasseR(): ?string
    {
        return $this->passe_reussi;
    }
    public function getTirs(): ?string
    {
        return $this->tirs;
    }
    public function getTirsC(): ?string
    {
        return $this->tirs_cadre;
    }
    public function getFaute(): ?string
    {
        return $this->faute;
    }
    public function getCartonJ(): ?string
    {
        return $this->carton_jaune;
    }
    public function getCartonR(): ?string
    {
        return $this->carton_rouge;
    }
    public function getTacle(): ?string
    {
        return $this->tacle;
    }
    public function getTacleR(): ?string
    {
        return $this->tacle_reussi;
    }
    public function getBut(): ?string
    {
        return $this->but;
    }
    public function getPasseD(): ?string
    {
        return $this->passe_d;
    }
    public function getMinutes(): ?string
    {
        return $this->minutes;
    }
    public function getBlessure(): ?bool
    {
        return $this->blessure;
    }
    public function getPoste(): ?string
    {
        return $this->poste;
    }
    //----------------//
    //-----SETTER-----//
    //----------------//

    public function setIdEvent($id_event): void
    {
        $this->id_event = $id_event;
    }
    public function setIdUtil($id_util): void
    {
        $this->id_util = $id_util;
    }
    public function setPresence($presence): void
    {
        $this->presence = $presence;
    }
    public function setPasse($passe): void
    {
        $this->passe = $passe;
    }
    public function setPasseR($passe_reussi): void
    {
        $this->passe_reussi = $passe_reussi;
    }
    public function setTirs($tirs): void
    {
        $this->tirs = $tirs;
    }
    public function setTirsC($tirs_cadre): void
    {
        $this->tirs_cadre = $tirs_cadre;
    }
    public function setFaute($faute): void
    {
        $this->faute = $faute;
    }
    public function setCartonJ($carton_jaune): void
    {
        $this->carton_jaune = $carton_jaune;
    }
    public function setCartonR($carton_rouge): void
    {
        $this->carton_rouge = $carton_rouge;
    }
    public function setTacle($tacle): void
    {
        $this->tacle = $tacle;
    }
    public function setTacleR($tacle_reussi): void
    {
        $this->tacle_reussi = $tacle_reussi;
    }
    public function setBut($but): void
    {
        $this->but = $but;
    }
    public function setPasseD($passe_d): void
    {
        $this->passe_d = $passe_d;
    }
    public function setBlessure($blessure): void
    {
        $this->blessure = $blessure;
    }
    public function setMinutes($minutes): void
    {
        $this->minutes = $minutes;
    }
    public function setPoste($poste): void
    {
        $this->poste = $poste;
    }

}
