<nav>
	<a href="<?php echo current_url(); ?>/addsite">Add a Site</a>
</nav>

<table class="hudDisplay">
	<thead>
		<tr>
			<th>Title</th>
			<th>URL</th>
			<th>Tracking ID</th>
			<th>Bounty</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach( $sites as $site ) : ?>
		<tr>
			<td><?php echo $site->title; ?></td>
			<td><?php echo $site->url; ?></td>
			<td><?php echo $site->track_id; ?></td>
			<td>$<?php echo $site->bounty; ?></td>
			<td>
				<a href="<?php echo base_url(); ?>sitemanager/details/<?php echo $site->id; ?>">details</a>
				<a href="<?php echo base_url(); ?>reports/site/<?php echo $site->track_id; ?>">reports</a>
			</td>
		</tr>
	<? endforeach; ?>
	<tbody>
</table>