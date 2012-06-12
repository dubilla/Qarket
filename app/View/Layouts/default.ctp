<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Qarket:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
		echo $this->Html->script('jquery-1.7.1'); // Include jQuery library
		echo $this->Html->script('bootstrap'); // Include Bootstrap library
		echo $this->Html->script('modernizr'); // Include the custom Modernizr build
	?>
</head>
<body>
	<div id="container" class="container">
		<div id="header">
			<div class="logo">
				Qarket Logo Here
			</div>
			<div class="login">
				<form action="users/login" method="post" class="login-form form-inline">
					<?php
					    echo $this->Form->input('username', array('class'=>'input-small', 'placeholder'=>'Username'));
					    echo $this->Form->input('password', array('class'=>'input-small', 'placeholder'=>'Password'));
					?>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
				<span class="register"><button class="btn btn-info" data-toggle="modal">Register</button> or </span>
			</div>
		</div>
		<div class="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<footer class="footer">
			<p>Qarket by Qarket LLC. Made with love in Atlanta, GA.</p>
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->Html->script('q'); // Include the Qarket JS ?>
</body>
</html>