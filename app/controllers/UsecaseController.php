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
				$this->jquery->click("#tache" . $tache->getId(), $this->jquery->removeClass("$(this).parent().find('.tache')", "active"));
				$this->jquery->click("#tache" . $tache->getId(), $this->jquery->addClass("#tache" . $tache->getId(), "active"));
				$this->jquery->click("#tache" . $tache->getId(), $this->jquery->removeClass("$(this).parent().find('.span-button-display')", "span-button-display"));
			}

			$this->view->setVar("taches", $taches);

			$this->jquery->compile($this->view);
		}
	}