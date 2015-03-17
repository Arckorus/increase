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
		$this->hasMany("id", "projet", "idClient");
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

}
