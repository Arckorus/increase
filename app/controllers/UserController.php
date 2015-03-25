<?php

	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Controller;

	class UserController extends ControllerBase {

		public function indexAction() {

		}

		public function projetsAction($id) {
			$user = User::findFirst($id);
			$projets = $user->getProjets();

			$this->view->setVar("user", $user);
			$this->view->setVar("projets", $projets);

			foreach ($projets as $projet) {
				$this->jquery->getAndBindTo("#btnProjet" . $projet->getId(), "click", "user/projet/" . $projet->getId(), "#detailProjet");
			}

			$this->jquery->compile($this->view);
		}

		public function projetAction($id) {
			$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

			$projet = Projet::findFirst($id);

			$this->view->setVar("projet", $projet);
		}
	}