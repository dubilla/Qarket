<?php

class UsersController extends AppController {
	public $name = 'Users';
	public $helpers = array('Html', 'Form');

	function register() {
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->write('user', $user);
				$this->Session->setFlash('Your registration information was accepted.');
				$this->redirect(array('controller'=> 'users', 'action' =>'view'));
 			} else {
				$this->Session->setFlash('There was a problem with your registration');
			}
		}
	}

	function knownusers() {
		$this->set('knownusers', $this->User->find(
			'all',
			array(
				'fields' => array('userID','username', 'first_name', 'last_name'),
				'order' => 'userID DESC'  
			)
		));
	}
	
	function login() {
		if ($this->request->is('post')) {
			$user = $this->User->findByUsername($this->request->data["username"]);
			if ($user != "") {
				if ($user["User"]["password"] == $this->request->data["password"]) {
					$this->Session->write('user', $user);
					$this->Session->setFlash('You are now signed in as ' . $user["User"]["username"]);
					$this->redirect(array('controller'=> 'users', 'action' =>'view'));
				} else {
					$this->Session->setFlash('That password is incorrect.');
				}
			} else {
				$this->Session->setFlash('That username could not be found.');
			}
		}
	}
	
	function view() {
		$this->set('user', $this->Session->read("user"));
	}
}