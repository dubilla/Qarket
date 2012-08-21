<?php

class CompanyOffer extends AppModel {
	public $name = 'CompanyOffer';
	
	public $useDbConfig = 'qarket';
	
	function getCurrentOffers($companyID) {
		$offers = $this->find('all', array('companyID' => $companyID));
		$this->set("offers", $offers);
	}

	function getExpiredOffers($companyID) {
		// Probably need a new API here
		// Let's parse this out on our side til they come back to us
		$offers = $this->CompanyOffer->find('all', array('companyID' => $companyID));
	}
}