<div class="accordion">
	<?php if ( !empty($bugs) ) : ?>
	<?php foreach ($bugs as $k=>$bugz) : ?>
		<h3><?php echo urldecode($k); ?></h3>
		<div>
			<?php foreach ( $bugz as $p ) : ?>
			<div class="report-row">
				<h5>Comments:</h5>
				<p><?php echo $p->comments; ?></p>
		
				<?php if ( isset($p->screenshot) && trim($p->screenshot) != "" ) : ?>
					<img class="sc" width="500px" height="300" src="data:image/png;base64,<?php echo $p->screenshot; ?>" />
				<?php endif; ?>
		
				<h5>Details:</h5>
				<ul>
					<li>Category: <?php echo $p->type; ?></li>
					<li>URL: <a href="<?php echo $p->url; ?>"><?php echo $p->url; ?></a></li>
				</ul>
			</div>
			<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>