<form action="<?= $this->Qarket->baseURL ?>users/register" method="post">
	<?php
	    echo $this->Form->input('first_name');
	    echo $this->Form->input('last_name');
	 	echo $this->Form->input('userName', array('after' => $this->Form->error
	       ('username_unique', 'The username is taken. Please try again.')));
	    echo $this->Form->input('email');
	    echo $this->Form->input('password');
		echo $this->Form->end('Register');
	?>
</form>