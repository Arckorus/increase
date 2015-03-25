<?php

class Tache extends \Phalcon\Mvc\Model
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
    public $libelle;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $avancement;

    /**
     *
     * @var string
     */
    public $codeUseCase;

	public function initialize()
	{
		$this->belongsTo("codeUseCase", "Usecase", "code", array("alias" => "usecase"));
	}

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'libelle' => 'libelle', 
            'date' => 'date', 
            'avancement' => 'avancement', 
            'codeUseCase' => 'codeUseCase'
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
	public function getLibelle()
	{
		return $this->libelle;
	}

	/**
	 * @param string $libelle
	 */
	public function setLibelle($libelle)
	{
		$this->libelle = $libelle;
	}

	/**
	 * @return string
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @param string $date
	 */
	public function setDate($date)
	{
		$this->date = $date;
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
	 * @return string
	 */
	public function getCodeUseCase()
	{
		return $this->codeUseCase;
	}

	/**
	 * @param string $codeUseCase
	 */
	public function setCodeUseCase($codeUseCase)
	{
		$this->codeUseCase = $codeUseCase;
	}
}
