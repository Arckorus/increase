<?php

class UserController extends Phalcon\Mvc\Controller {

	public function indexAction() {

	}

	public function projetsAction($id) {
		$projets = Projet::find(array("idClient" => $id));
		$this->view->setVar("projets", $projets);

		foreach ($projets as $projet) {
			$this->jquery->getAndBindTo("#btnProjet" . $projet->getId(), "click", "user/projet/" . $projet->getId(), "#detailProjet");
		}

		$this->jquery->compile($this->view);
	}

	public function projetAction($id) {

	}
}