<?php

class Comments
{
    private $user;
    private $content;
    private $date;

    public function __construct($content, $username = 'Anonyme')
    {
        // Attention $this est l'objet courant, 
        // $this->username n'existe PAS !
        $this->user     = $username;
        $this->content  = $content;

        // On appelle la méthode privée setDateNow pour initialiser la date à maintenant
        $this->setDateNow();
    }

    // GETTER méthode pour rendre exploitable une propriété sans pour autant permettre de changer sa valeur par défaut et de faire n'importe quoi

    public function getUser()
    {
        return $this->user;
    }

    // SETTER méthode pour autoriser la mise à jour une valeur (sans rien retourner ce n'est pas nécéssaire)

    public function setUser($username)
    {
        $this->user = $username;
    }

    private function setDateNow()
    {
        $this->date = new DateTime();
    }
}

// Création d'un objet: appelle le CONSTRUCTEUR
$cmt = new Comments('Bonjour je suis fan de vos articles!', 'Jean');

// Récupération de valeur via paramètre impossible, user est PRIVATE:
// $cmt->user;

// On passe donc par un getter: 
$cmt->getUser();

// Utilisation du setter:
$cmt->setUser('PseudoCoolXxxXX');
