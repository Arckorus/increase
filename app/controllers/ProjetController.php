<?php

class ProjetController extends ControllerBase
{
	public function indexAction(){
		$this->view->setVar("equipe", User::find());
		$this->view->setVar("projet", Projet::find());
	}


	public function equipeAction($id) {

	}
}