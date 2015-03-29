<?php

	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Controller;

	class UsecaseController extends ControllerBase
	{

		public function indexAction()
		{

		}

		public function tachesAction($id)
		{
			$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

			$taches = Tache::findByCodeUseCase($id);

			foreach ($taches as $tache) {

				// Un clic sur une tâche desactive les tâches du même groupe déjà active en remontant l'arborescence du DOM
				$this->jquery->click("#tache" . $tache->getId(), $this->jquery->removeClass("$(this).parent().find('.tache')", "active"));

				// Un clic sur une tâche la rend active, via l'ajout de la class active.
				$this->jquery->click("#tache" . $tache->getId(), $this->jquery->addClass("#tache" . $tache->getId(), "active"));

				// Un clic sur une tâche enlève aux deux boutons la class qui permet de les masquer en remontant le DOM.
				$this->jquery->click("#tache" . $tache->getId(), $this->jquery->removeClass("$(this).parent().find('.span-button-display')", "span-button-display"));
			}

			$this->view->setVar("taches", $taches);

			$this->jquery->compile($this->view);
		}
	}