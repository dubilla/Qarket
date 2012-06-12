<div class="hero-unit">
        <h1>Qarket for Companies</h1>
        <p>Get your customers into your brand and have them stick.  Have new customers find you via your loyal ones, and turn your new ones into your future loyal ones.</p>
        <p><a href="users/register" class="btn btn-primary btn-large">Register your company now »</a></p>
</div>

<div class="row">
	<div class="span4">
		<h2>Learn</h2>
			<p>Learn about your customers habits, and encourage them to spread their love for you through shared deals that you set up and customize.</p>
          	<p><a class="btn" href="#">View details »</a></p>
	</div>
	<div class="span4">
		<h2>Monitor</h2>
		<p>Monitor analytics of your customer's spending habits.  See which deals they use and which they don't, and tweak your future promotions to fit their needs.</p>
		<p><a class="btn" href="#">View details »</a></p>
	</div>
	<div class="span4">
		<h2>Grow</h2>
		<p>Through Qarket's deal exchange system, watch as your customer's spread the word about your promotions, and discover exactly who your most important customers are.</p>
          <p><a class="btn" href="#">View details »</a></p>
	</div>
</div>

<div id="register" class="modal fade" style="display: none;">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Register for Qarket</h3>
	</div>
	<div class="modal-body">
		<form action="companies/register" method="post" class="modal-register">
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