<?php

class Message extends \Phalcon\Mvc\Model
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
    public $objet;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $idUser;

    /**
     *
     * @var integer
     */
    public $idProjet;

    /**
     *
     * @var integer
     */
    public $idFil;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'objet' => 'objet', 
            'content' => 'content', 
            'date' => 'date', 
            'idUser' => 'idUser', 
            'idProjet' => 'idProjet', 
            'idFil' => 'idFil'
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
	public function getObjet()
	{
		return $this->objet;
	}

	/**
	 * @param string $objet
	 */
	public function setObjet($objet)
	{
		$this->objet = $objet;
	}

	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content)
	{
		$this->content = $content;
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
	public function getIdUser()
	{
		return $this->idUser;
	}

	/**
	 * @param int $idUser
	 */
	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
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
	public function getIdFil()
	{
		return $this->idFil;
	}

	/**
	 * @param int $idFil
	 */
	public function setIdFil($idFil)
	{
		$this->idFil = $idFil;
	}
}
