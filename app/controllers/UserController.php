<?php

	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Controller;

	class UserController extends ControllerBase {

		public function indexAction() {

		}

		public function projetsAction($id) {
			$user = User::findFirst($id);
			$projets = $user->getProjets();

			$donnees = array();

			foreach ($projets as $key => $projet) {
				// Calcul du nombre de jour restant.
				$donnees[$key]['jourRestant'] = (new DateTime(date("d-m-Y")))->diff(new DateTime($projet->getDateFinPrevue()));

				// Calcul de l'avancement du projet, en %.
				$poidsTotal = 0;
				foreach ($projet->getUsecase() as $usecase) {
					$poidsTotal += $usecase->getPoids();
				}
				$avancement = 0;
				foreach ($projet->getUsecase() as $usecase) {
					$avancement += (($usecase->getPoids() * 100 / $poidsTotal) / 100) * $usecase->getAvancement();
				}
				$donnees[$key]['avancement'] = round($avancement);

				// Calcul du temps écoulé, en %.
				$nbJourTotal = floor(abs(strtotime($projet->getDateLancement()) - strtotime($projet->getDateFinPrevue())) / (60 * 60 * 24));
				$nbJourEcoule = floor(abs(strtotime($projet->getDateLancement()) - strtotime(date("d-m-Y"))) / (60 * 60 * 24));
				$donnees[$key]['tempEcoule'] = round(($nbJourEcoule * 100) / $nbJourTotal);
			}


			$this->view->setVar("user", $user);
			$this->view->setVar("projets", $projets);
			$this->view->setVar("donnees", $donnees);

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