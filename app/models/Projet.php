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

	public $jourRestant;

	public $avancement;

	public $tempsEcoule;

	public function initialize()
	{
		$this->hasMany("id", "Usecase", "idProjet");
		$this->hasMany("id", "Message", "idProjet");
		$this->belongsTo("idClient", "User", "id");
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

	public function afterFetch()
	{
		// Calcul du nombre de jour restant.
		$this->jourRestant = (new DateTime(date("d-m-Y")))->diff(new DateTime($this->dateFinPrevue));

		// Calcul de l'avancement du projet, en %.
		$poidsTotal = 0;
		foreach ($this->getUsecase() as $usecase) {
			$poidsTotal += $usecase->getPoids();
		}
		foreach ($this->getUsecase() as $usecase) {
			$this->avancement += (($usecase->getPoids() * 100 / $poidsTotal) / 100) * $usecase->getAvancement();
		}
		$this->avancement = round($this->avancement);

		// Calcul du temps écoulé, en %.
		$nbJourTotal = floor(abs(strtotime($this->dateLancement) - strtotime($this->dateFinPrevue)) / (60 * 60 * 24));
		$nbJourEcoule = floor(abs(strtotime($this->dateLancement) - strtotime(date("d-m-Y"))) / (60 * 60 * 24));
		$this->tempsEcoule = round(($nbJourEcoule * 100) / $nbJourTotal);
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
	 * @return mixed
	 */
	public function getJourRestant()
	{
		return $this->jourRestant;
	}

	/**
	 * @param mixed $jourRestant
	 */
	public function setJourRestant($jourRestant)
	{
		$this->jourRestant = $jourRestant;
	}

	/**
	 * @return mixed
	 */
	public function getAvancement()
	{
		return $this->avancement;
	}

	/**
	 * @param mixed $avancement
	 */
	public function setAvancement($avancement)
	{
		$this->avancement = $avancement;
	}

	/**
	 * @return mixed
	 */
	public function getTempsEcoule()
	{
		return $this->tempsEcoule;
	}

	/**
	 * @param mixed $tempsEcoule
	 */
	public function setTempsEcoule($tempsEcoule)
	{
		$this->tempsEcoule = $tempsEcoule;
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
