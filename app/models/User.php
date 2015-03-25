<?php

class User extends \Phalcon\Mvc\Model
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
    public $mail;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $identite;

    /**
     *
     * @var string
     */
    public $role;

	public function initialize() {
		$this->hasMany("id", "Usecase", "idDev", array("alias" => "usecase"));
		$this->belongsTo("id", "Message", "id", array("alias" => "messageId"));
		$this->hasMany("id", "Message", "idUser", array("alias" => "messageUser"));
		$this->hasMany("id", "Message", "idFil", array("alias" => "messageFil"));
		$this->hasMany("id", "Projet", "idClient", array("alias" => "projets"));
	}

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'mail' => 'mail', 
            'password' => 'password', 
            'identite' => 'identite', 
            'role' => 'role'
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
	public function getMail()
	{
		return $this->mail;
	}

	/**
	 * @param string $mail
	 */
	public function setMail($mail)
	{
		$this->mail = $mail;
	}

	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getIdentite()
	{
		return $this->identite;
	}

	/**
	 * @param string $identite
	 */
	public function setIdentite($identite)
	{
		$this->identite = $identite;
	}

	/**
	 * @return string
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * @param string $role
	 */
	public function setRole($role)
	{
		$this->role = $role;
	}
}
