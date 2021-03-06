<div id="myCarousel" class="carousel">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
		<?php echo $this->Html->image('carousel/carousel1.jpg', array('alt' => 'Image'))?>
    </div>
    <div class="item">
		<?php echo $this->Html->image('carousel/carousel2.jpg', array('alt' => 'Image'))?>
    </div>
    <div class="item">
		<?php echo $this->Html->image('carousel/carousel3.jpg', array('alt' => 'Image'))?>
    </div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
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

<div id="register" class="modal fade hide">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Register for Qarket</h3>
	</div>
	<div class="modal-body">
		<?= $this->element('register-form'); ?>
	</div>
</div>