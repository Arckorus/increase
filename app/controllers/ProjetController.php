<?php

	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Controller;

	class ProjetController extends ControllerBase {

		public function indexAction(){

		}

		public function equipeAction($id) {
			$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

			$projet = Projet::findFirst($id);
			$usecases = $projet->getUsecase();

			$users = array();
			$poids = array();
			foreach ($usecases as $key => $usecase){
				if (!in_array($usecase->getUser(), $users)) {
					$users[$key] = $usecase->getUser();
					$poids[$key] = 0;
				}
				foreach ($users as $key2 => $user) {
					if ($usecase->getUser() == $user) {
						$poids[$key2] += $usecase->getPoids();
					}
				}
			}

			$sommePoids = 0;
			foreach ($poids as $poid) {
				$sommePoids += $poid;
			}

			$this->view->setVar("users", $users);
			$this->view->setVar("poids", $poids);
			$this->view->setVar("sommePoids", $sommePoids);
			$this->jquery->compile($this->view);
		}

		public function messagesAction($id) {
			$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

			$projet = Projet::findFirst($id);
			$messages = $projet->getMessage("idFil is null");

			foreach ($messages as $key => $message) {
				$this->jquery->getAndBindTo("#getContent" . $message->getId(), "click", "projet/reponses/" . $message->getId(), "#content" . $message->getId());
			}

			$this->view->setVar("projet", $projet);
			$this->view->setVar("messages", $messages);

			$this->jquery->compile($this->view);
		}

		public function reponsesAction($id) {
			$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

			$message = Message::findFirst($id);
			$responses = Message::find("idFil = " . $id);

			foreach ($responses as $key => $reponse) {
				$this->jquery->getAndBindTo("#getContent" . $reponse->getId(), "click", "projet/reponses/" . $reponse->getId(), "#content" . $reponse->getId());
			}

			$this->view->setVar("message", $message);
			$this->view->setVar("responses", $responses);

			$this->jquery->compile($this->view);
		}

		public function authorAction($idProjet, $idAuthor) {
			$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

			$usecases = Usecase::find(array("idDev = " . $idAuthor, "idProjet = " . $idProjet));

			foreach ($usecases as $key => $usecase) {
				$this->jquery->getAndBindTo("#getUseCase-" . $usecase->getCode(), "click", "usecase/taches/" . $usecase->getCode(), "#divUseCase-" . $usecase->getCode());
			}

			$this->view->setVar("usecases", $usecases);

			$this->jquery->compile($this->view);
		}
	}