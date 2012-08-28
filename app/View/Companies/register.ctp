<form action="<?= $this->Qarket->baseURL ?>qarket/companies/register" method="post">
	<p>Please fill out the form below to register an account.</p>
	<?php
	 	echo $this->Form->input('username', array('after' => $this->Form->error
	       ('username_unique', 'The username is taken. Please try again.')));
	    echo $this->Form->input('name');
	    echo $this->Form->input('email');
	    echo $this->Form->input('password');
	    echo $this->Form->input('street');
	    echo $this->Form->input('city');
	    echo $this->Form->input('state');
	    echo $this->Form->input('zip');
		echo $this->Form->input('cname');
	    echo $this->Form->input('desc');
	    echo $this->Form->input('logo');
	    echo $this->Form->input('lat');
	    echo $this->Form->input('long');
		echo $this->Form->end('Register');

	/*	http://www.qarket.com:6590/registerCompany?userName=hamilton123&name=Hamilton&email=glenn.h.evans@gmail.com&password=AA914AA8CAA1A7F3C142918DEDBFB643&street=6592%20Long%20Acres%20Drive&city=Sandy%20Springs&state=GA&zip=30328&cname=Hudson%20Grille&cdesc=All%20American%20Food%20And%20Drink&logo=hudson_grille.png&lat=33.861&lon=-84.3399
*/
	?>
</form>