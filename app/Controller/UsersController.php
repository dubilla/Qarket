<?php

class UsersController extends AppController {
	public $name = 'Users';
	public $helpers = array('Html', 'Form');

	function register() {
		if ($this->request->is('post')) {
			$result = $this->User->save($this->request->data);
			if ($result) {
				$user = $this->request->data;
				$this->Session->write('user', $user);
				$this->Session->setFlash('Your registration information was accepted.');
				$this->redirect(array('controller'=> 'users', 'action' =>'view'));
 			} else {
				$this->Session->setFlash('There was a problem with your registration');
			}
		}
	}

	function login() {
		if ($this->request->is('post')) {
			$result = $this->User->find("all", $this->request->data);
			$response = $result["User"]["responseHeader"];
			if ($response != "") {
				// Success
				if ($response["responseCode"] == 0) {
					$user = $response["validation"];
					$this->Session->write('user', $user);
					$this->Session->setFlash('You are now signed in as ' . $user["User"]["username"]);
					$this->redirect(array('controller'=> 'users', 'action' =>'view'));
				// Invalid username
				} else if ($response["responseCode"] == 1) {
					$this->Session->setFlash('That username could not be found.');
					$this->redirect(array('controller'=> 'users', 'action' =>'login'));
				// Invalid password
				} else if ($response["responseCode"] == 2) {
					$this->Session->setFlash('That password is incorrect.');
					$this->redirect(array('controller'=> 'users', 'action' =>'login'));
				// Unknown user
				} else {
					$this->Session->setFlash('There was a server error.  Please try again.');
				}
			}
		}
	}
	
	function logout() {
		$this->Session->delete('user');
		$this->redirect('/');
	}
	
	function view() {
		$this->set('user', $this->Session->read("user"));
	}
}