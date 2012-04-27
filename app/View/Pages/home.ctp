<div class="login">
	<form action="users/login" method="post" class="login-form form-inline">
		<?php
		    echo $this->Form->input('username', array('class'=>'input-small'));
		    echo $this->Form->input('password', array('class'=>'input-small'));
		?>
		<button type="submit" class="btn">Login</button>
	</form>
	<span>Not a user? <a href="#register" data-toggle="modal">Register</a>now</span>
</div>

<div class="hero-unit">
        <h1>Welcome to Qarket</h1>
        <p>Collect, trade, and cash in on deals from nearby bars to national chain restaurants.  Join now to start saving and experiencing your neighborhood in a new way.  Come see what's waiting in your local Qarket.</p>
        <p><a href="users/register" class="btn btn-primary btn-large">Register »</a></p>
</div>

<div class="row">
	<div class="span4">
		<h2>Collect</h2>
			<p>Collect deals from your favorite local bars and restaurants.  Keep track of your deals, past and present, and see build up points to earn even more deals.</p>
          	<p><a class="btn" href="#">View details »</a></p>
	</div>
	<div class="span4">
		<h2>Save</h2>
		<p>Snap and save your favorite deals using the <a href="#">Qarket app</a>.  Find deals at local bars and restaurants wherever you see the Qarket deals logo.</p>
		<p><a class="btn" href="#">View details »</a></p>
	</div>
	<div class="span4">
		<h2>Trade</h2>
		<p>Got a hot deal that you just can't use?  Send it to a friend for them to use and earn extra points to earn deals for yourself.</p>
          <p><a class="btn" href="#">View details »</a></p>
	</div>
</div>

<div id="register" class="modal fade" style="display: none;">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Register for Qarket</h3>
	</div>
	<div class="modal-body">
		<form action="users/register" method="post" class="modal-register">
			<p>Please fill out the form below to register an account.</p>
			<?php
			    echo $this->Form->input('first_name');
			    echo $this->Form->input('last_name');
			 	echo $this->Form->input('username', array('after' => $this->Form->error
			       ('username_unique', 'The username is taken. Please try again.')));
			    echo $this->Form->input('email');
			    echo $this->Form->input('password');
			?>
			<button type="submit" class="btn btn-large btn-primary">Register</button>
		</form>
	</div>
</div>