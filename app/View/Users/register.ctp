<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<p>Please fill out the form below to register an account.</p>
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