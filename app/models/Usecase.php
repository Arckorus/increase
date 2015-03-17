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

}
