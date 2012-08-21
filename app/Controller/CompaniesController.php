<?php

class CompaniesController extends AppController {
	public $name = 'Companies';
	public $helpers = array('Html', 'Form');
	
	function index() {
		
	}

	function login() {
		if ($this->request->is('post')) {
			$this->loadModel("Profile");
			$profile = $this->Profile->findByEmail($this->request->data["username"]);
			$company = $this->Company->find('all', array('Company.profileID' => $profile["Profile"]["profileID"]));
			if ($profile != "") {
				if ($profile["Profile"]["password"] == $this->request->data["password"]) {
					$this->Session->write('company', $company);
					$this->Session->write('profile', $profile);
					$this->Session->setFlash('You are now signed in as ' . $profile["Profile"]["name"]);
					exit();
					$this->redirect(array('controller'=> 'companies', 'action' =>'view'));
				} else {
					$this->Session->setFlash('That password is incorrect.');
				}
			} else {
				$this->Session->setFlash('That username could not be found.');
			}
		}
	}
	
	function view() {
		Controller::loadModel('CompanyOffer');
		$currentOffers = $this->CompanyOffer->getCurrentOffers($this->Company->user["userID"]);
		$expiredOffers = $this->CompanyOffer->getExpiredOffers();
		$this->set('offers', $currentOffers);
		$this->set('user', $this->Session->read("user"));
	}

	function register() {
		if ($this->request->is('post')) {
			if ($this->Company->save($this->request->data)) {
				$company = $this->request->data;
				$this->Session->write('user', $company);
				$this->Session->setFlash('Your registration information was accepted.');
				$this->redirect(array('controller'=> 'companies', 'action' =>'view'));
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

}