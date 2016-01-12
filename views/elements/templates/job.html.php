<hr />

<blockquote style="float: right; width: 200px; font-size: .75em; text-align: right; color: #6D6E75;">
	<p class="m-b-0"><?=$job->term;?></p>
</blockquote>

<h3><?=$job->company;?> <?php if($job->expanded_info) {?><a style="font-size: .35em;" class="btn btn-secondary btn-sm" data-toggle="collapse" href="#expanded_info_<?=strtolower($job->company);?>" aria-expanded="false" aria-controls="expanded_info_<?=strtolower($job->company);?>">tell me more</a><?php } ?></h3>

<?php if($job->expanded_info) {?>
<div class="collapse" id="expanded_info_<?=strtolower($job->company);?>">
	<div class="card card-block">
		<?php echo nl2br($job->expanded_info); ?>
	</div>
</div>
<?php } ?>

<p><?=$job->summary;?></p>

<blockquote class="blockquote">
	<p class="m-b-0"><?=$job->title;?></p>
</blockquote>

<?php echo $this->view()->render(array('element' => 'tags'), array('tags' => (object) $job->tags)); ?>

<ul class="list-group">
	<?php foreach ($job->highlights as $highlight) { ?>
	<li class="list-group-item"><?php echo htmlspecialchars_decode($highlight);?></li>
	<?php } ?>
</ul>

<div class="clear" style="height: 20px;"></div>