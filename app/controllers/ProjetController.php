<?php

	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Controller;

	class ProjetController extends ControllerBase
	{
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
	}