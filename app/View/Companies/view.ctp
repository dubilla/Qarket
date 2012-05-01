<h1 class="well">Dan's Burgers <?php // echo $company["Company"]["companyName"] ?></h1>
<address>
	<?php echo $address["Address"]["street"] ?><br />
	<?php echo $address["Address"]["city"] . ', ' . $address["Address"]["street"] ?>
</address>
<p>
	<?php echo $company["Company"]["description"] ?>
</p>

<div class="row deals-overview">
	<div class="deals current-deals span6">
		<h3>Current Deals</h3>
		<ul>
			<?php foreach ($currentDeals as $deal) { ?>
				<li>
			
				</li>
			<?php } ?>
		</ul>
		<a class="btn btn-primary btn-large" href="#myModal" data-toggle="modal">Create a Deal</a>
	</div>

	<div class="deals expired-deals span6">
		<h3>Expired Deals</h3>
		<ul>
			<?php foreach ($expiredDeals as $deal) { ?>
				<li>
			
				</li>
			<?php } ?>
		</ul>
	</div>
</div>

<div id="myModal" class="modal hide fade in" style="display:none;">
	<div class="modal-header">
		<h3>Create a Deal</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<fieldset>
				<?php
				    echo $this->Form->input('title');
					echo $this->Form->input('description', array('type' => 'textarea', 'escape' => false));
				 	echo $this->Form->input('validStart');
				    echo $this->Form->input('valildEnd');
				    echo $this->Form->input('validLength');
				?>
				<button type="submit" class="btn btn-large btn-primary">Save</button>
			</fieldset>
		</form>
	</div>
</div>