<?php
namespace app\Models;

class Article extends Model
{
    protected $id;
    protected $titre;
    protected $auteur;
    protected $categorie;
    protected $description;
    protected $datecreaion;
    protected $etat;
    protected $photo;
    var $table='article';

   /* public function __construct($id,$titre,$auteur,$categorie,$description,$datecreation,$etat,$photo)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->auteur=$auteur;
        $this->categorie=$categorie;
        $this->description=$description;
        $this->datecreaion=$datecreation;
        $this->etat=$etat;
        $this->photo=$photo;
    }*/

    /**
     * convertir un objet en chaine de caratere
     */

    public function __toString()
    {
        return $this->titre.' '.$this->auteur.' '.$this->categorie.' '.$this->description.' '.$this->etat.' '.$this->photo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDatecreaion()
    {
        return $this->datecreaion;
    }

    /**
     * @param mixed $datecreaion
     */
    public function setDatecreaion($datecreaion)
    {
        $this->datecreaion = $datecreaion;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }







}