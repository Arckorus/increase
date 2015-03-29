<?php

	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Controller;

	class AuthorController extends ControllerBase
	{

		public function indexAction()
		{

		}

		public function projetsAction($id)
		{
			$user     = User::findFirst($id);
			$usecases = $user->getUsecase();

			$projets = array();

			// On remplit le tableau des projets.
			foreach ($usecases as $key => $usecase) {
				if (!in_array($usecase->getProjet(), $projets)) {
					$projets[$key] = $usecase->getProjet();
				}
			}

			$donnees = array();

			// On remplit un tableau contenant les calculs, la correspondance entre le projet et le sous-tableau se fait via la variable $key du foreach.
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
				$nbJourTotal                 = floor(abs(strtotime($projet->getDateLancement()) - strtotime($projet->getDateFinPrevue())) / (60 * 60 * 24));
				$nbJourEcoule                = floor(abs(strtotime($projet->getDateLancement()) - strtotime(date("d-m-Y"))) / (60 * 60 * 24));
				$donnees[$key]['tempEcoule'] = round(($nbJourEcoule * 100) / $nbJourTotal);
			}


			$this->view->setVar("user", $user);
			$this->view->setVar("projets", $projets);
			$this->view->setVar("donnees", $donnees);

			// Clic sur les boutons "Ouvrir...", pour afficher le détail du projet.
			foreach ($projets as $projet) {
				$this->jquery->getAndBindTo("#btnProjet" . $projet->getId(), "click", "author/projet/" . $projet->getId(), "#infoProjet");
			}

			$this->jquery->compile($this->view);
		}

		public function projetAction($id)
		{
			$projet = Projet::findFirst($id);
			$this->jquery->get("projet/author/" . $projet->getId() . "/2", "#detailProjet");

			$messages = $projet->getMessage();

			// Clic sur le bouton "X Messages...", pour afficher les messages (d'abord ceux du premier niveau de subordination).
			$this->jquery->getAndBindTo("#btnMessages", "click", "projet/messages/" . $projet->getId(), "#divMessages");

			$user = $projet->getUser();

			// Clic sur le bouton "Fermer le projet", pour retourner à la liste des projets.
			$this->jquery->getAndBindTo("#closeProjet", "click", "user/projets/" . $user->getId(), "#listeProjets");

			$this->view->setVar("projet", $projet);
			$this->view->setVar("messages", $messages);
			$this->view->setVar("user", $user);

			$this->jquery->compile($this->view);
		}
	}