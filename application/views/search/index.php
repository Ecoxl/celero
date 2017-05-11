<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<?php if(!empty($companies)): ?>
				<p class="lead">Companies</p>
			<?php foreach ($companies as $c): ?>
				<div><a href="<?php echo base_url('company/'.$c['id']); ?>"><?php echo $c['name']; ?></a></div>
				<div><?php echo $c['description']; ?></div>
				<hr>
			<?php endforeach ?>
			<?php endif ?>
			<?php if(!empty($projects)): ?>
			<p class="lead">Projects</p>
			<?php foreach ($projects as $p): ?>
				<div><a href="<?php echo base_url('project/'.$p['id']); ?>"><?php echo $p['name']; ?></a></div>
				<div><?php echo $p['description']; ?></div>
				<hr>
			<?php endforeach ?>
			<?php endif ?>
		</div>
	</div>
</div>