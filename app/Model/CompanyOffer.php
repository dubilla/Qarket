<?php

class CompanyOffer extends AppModel {
	public $name = 'CompanyOffer';
	public $useTable = 'CompanyOffer';
	public $primaryKey = 'companyOfferID';
	
	function getCurrentDeals() {
		$currentDeals = $this->find('all');
		return $currentDeals;
	}
	
	function getExpiredDeals() {
		$expiredDeals = $this->find('all');
		return $expiredDeals;
	}

/*
	public $validate = array(
		'username' => array(
			'rule' => '/^[a-z0-9]{6,40}$/i',
			'message' => 'This field cannot be left blank.',
			'required' => true
		),
		'password' => array(
			'rule' => '/^[a-z0-9]{6,40}$/i',
			'message' => 'This field cannot be left blank.',
			'required' => true
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Please supply a valid email address.',
			'required' => true
		)
	);

	
	function beforeValidate() {
		if (!$this->id) {
	    	if ($this->findByUsername($this->data['User']['username'])) {
	      		$this->invalidate('username_unique');
	      		return false;
	    	}
	  	}
	  	return true;
	}
*/
}