<?php

	/**
	 * SessionController
	 * Allows to authenticate users
	 */
	class SessionController extends ControllerBase
	{

		public function initialize()
		{

		}

		public function indexAction()
		{
			if (!$this->request->isPost()) {
				$this->tag->setDefault('mail', 'johndoe@kobject.net ');
				$this->tag->setDefault('password', '0000');
			}
		}

		/**
		 * Register an authenticated user into session data
		 */
		private function _registerSession(User $user)
		{
			$this->session->set('auth', array(
				'id'   => $user->getId(),
				'name' => $user->getIdentite()
			));
		}

		/**
		 * This action authenticate and logs an user into the application
		 */
		public function startAction()
		{
			if ($this->request->isPost()) {

				$mail     = $this->request->getPost('mail');
				$password = $this->request->getPost('password');

				$user = User::findFirst(array(
					"mail = :mail: AND password = :password:",
					'bind' => array('mail' => $mail, 'password' => $this->javaToPhpSha($password))
				));

				if ($user != false) {
					$this->_registerSession($user);
					$this->flash->success('Welcome ' . $user->getIdentite());
					return $this->forward($user->getRole() . '/projets/' . $user->getId());
				}

				$this->flash->error('Wrong email/password');
			}

			return $this->forward('session/index');
		}

		/**
		 * Finishes the active session redirecting to the index
		 */
		public function endAction()
		{
			$this->session->remove('auth');
			$this->flash->success('Goodbye!');
			return $this->forward('index/index');
		}

		/**
		 * Permet de hasher correctement le mot de passe
		 */
		private function javaToPhpSha($str)
		{
			$k         = hash("sha256", $str, true);
			$hex_array = array();

			foreach (str_split($k) as $chr) {
				$o = ord($chr);
				if ($o > 127) {
					$o = $o - 256;
				} else if ($o < -127) {
					$o = $o + 256;
				}
				$hex_array[] = sprintf("%02x", $o);
			}

			$key = implode('', $hex_array);
			return $key;
		}
	}