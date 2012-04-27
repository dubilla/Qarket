<form action="login" method="post">
	<?php
	    echo $this->Form->input('username');
	    echo $this->Form->input('password');
		echo $this->Form->end('Login');
	?>
</form>