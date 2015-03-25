<?php

	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Controller;

	class UserController extends ControllerBase {

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
			$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

			$messages = Message::find(array("idMessage" => $id));
			$projet = Projet::findFirst($id);

			$this->view->setVar("messages", $messages);
			$this->view->setVar("projet", $projet);

			foreach ($messages as $message) {
				$this->jquery->getAndBindTo("#btnMessage", "click", "user/project/" . $message->getIdProjet(), "#messages");

			}

			$this->jquery->compile($this->view);
		}

	}