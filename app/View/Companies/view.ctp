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
	<h3>Create a Deal</h3>
	<form class="form-horizontal">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="input01">Deal Title</label>
			  	<div class="controls">
			    	<input type="text" class="input-xlarge" id="input01">
            	</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input02">Description</label>
			  	<div class="controls">
					<textarea class="input-xlarge" id="input02" rows="3"></textarea>
            	</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input03">Start Date</label>
			  	<div class="controls">
			    	<input type="date" class="input-xlarge" id="input03">
            	</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input04">End Date</label>
			  	<div class="controls">
			    	<input type="date" class="input-xlarge" id="input04">
            	</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input05">Valid Length</label>
			  	<div class="controls">
			    	<input type="text" class="input-xlarge" id="input06">
					<p class="help-block">How long, in days, the deal will be valid for after it's scanned'</p>
            	</div>
			</div>
		</fieldset>
	</form>
</div>