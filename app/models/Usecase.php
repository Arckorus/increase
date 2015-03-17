<?php

class Usecase extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var string
     */
    public $nom;

    /**
     *
     * @var integer
     */
    public $poids;

    /**
     *
     * @var integer
     */
    public $avancement;

    /**
     *
     * @var integer
     */
    public $idProjet;

    /**
     *
     * @var integer
     */
    public $idDev;

	public function initialize()
	{
		$this->belongsTo("idProjet", "Projet", "id");
	}

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'nom' => 'nom', 
            'poids' => 'poids', 
            'avancement' => 'avancement', 
            'idProjet' => 'idProjet', 
            'idDev' => 'idDev'
        );
    }

	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 */
	public function setCode($code)
	{
		$this->code = $code;
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
	 * @return int
	 */
	public function getPoids()
	{
		return $this->poids;
	}

	/**
	 * @param int $poids
	 */
	public function setPoids($poids)
	{
		$this->poids = $poids;
	}

	/**
	 * @return int
	 */
	public function getAvancement()
	{
		return $this->avancement;
	}

	/**
	 * @param int $avancement
	 */
	public function setAvancement($avancement)
	{
		$this->avancement = $avancement;
	}

	/**
	 * @return int
	 */
	public function getIdProjet()
	{
		return $this->idProjet;
	}

	/**
	 * @param int $idProjet
	 */
	public function setIdProjet($idProjet)
	{
		$this->idProjet = $idProjet;
	}

	/**
	 * @return int
	 */
	public function getIdDev()
	{
		return $this->idDev;
	}

	/**
	 * @param int $idDev
	 */
	public function setIdDev($idDev)
	{
		$this->idDev = $idDev;
	}
}
