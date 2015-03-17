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

}
