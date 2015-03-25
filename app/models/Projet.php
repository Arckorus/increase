<?php

class Projet extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $nom;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $dateLancement;

    /**
     *
     * @var string
     */
    public $dateFinPrevue;

    /**
     *
     * @var integer
     */
    public $idClient;

	public function initialize()
	{
		$this->hasMany("id", "Usecase", "idProjet", array("alias" => "usecase"));
		$this->hasMany("id", "Message", "idProjet", array("alias" => "message"));
		$this->belongsTo("idClient", "User", "id", array("alias" => "user"));
	}

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'nom' => 'nom', 
            'description' => 'description', 
            'dateLancement' => 'dateLancement', 
            'dateFinPrevue' => 'dateFinPrevue', 
            'idClient' => 'idClient'
        );
    }

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @param string $nom
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDateLancement()
	{
		return $this->dateLancement;
	}

	/**
	 * @param string $dateLancement
	 */
	public function setDateLancement($dateLancement)
	{
		$this->dateLancement = $dateLancement;
	}

	/**
	 * @return string
	 */
	public function getDateFinPrevue()
	{
		return $this->dateFinPrevue;
	}

	/**
	 * @param string $dateFinPrevue
	 */
	public function setDateFinPrevue($dateFinPrevue)
	{
		$this->dateFinPrevue = $dateFinPrevue;
	}

	/**
	 * @return int
	 */
	public function getIdClient()
	{
		return $this->idClient;
	}

	/**
	 * @param int $idClient
	 */
	public function setIdClient($idClient)
	{
		$this->idClient = $idClient;
	}
}
