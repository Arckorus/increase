<?php

class ProjetController extends ControllerBase
{
	public function indexAction($id){
		$equipe = User::find(array("id" => $id));
		$projet = Projet::find(array("idClient => $id"));
		$this->view->setVar("equipe", $equipe);
	}


	public function equipeAction($id) {

	}
}