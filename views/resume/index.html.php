	<div style="min-height: 300px;">
		<div>
			<h4>Justin Jenkins | Web Developer</h4>
			<p>
				<a href="https://twitter.com/justinjenkins" class="label label-primary" target="_blank">twitter</a>
				<a href="https://stackoverflow.com/users/296167/justin-jenkins?tab=profile" class="label label-warning" target="_blank">stackoverflow</a>
				<a href="https://www.linkedin.com/in/justinajenkins" class="label label-info" target="_blank">linkedin</a>
				<a href="https://justinjenkins.net/Justin_Jenkins_Resume.pdf" class="label label-default" target="_blank">download pdf</a>
			</p>
			<p><small class="text-muted">10728 Interlake Ave N, Seattle, Washington | <a href="mailto:justinjenkins@gmail.com">justinjenkins@gmail.com</a></small></p>
			<p class="lead">I love to architect and develop effective, creative and refreshing solutions to complex problems.</p>

			<div style="width: 280px; float: right; font-size: .85em; margin-left: 30px;">
				PHP/Web Dev <progress class="progress progress-small" value="77" max="100"></progress>
				SQL/MongoDB <progress class="progress progress-success progress-small" value="80" max="100"></progress>
				HTML/CSS <progress class="progress progress-info progress-small" value="55" max="100"></progress>
				JavaScript/jQuery <progress class="progress progress-warning progress-small" value="73" max="100"></progress>
				Linux/DevOps<progress class="progress progress-danger progress-small" value="65" max="100"></progress>
			</div>

			<p>Problems are opportunities; a chance to tweak just one thing or redo everything to make an impact, a change or simply communicate better. I enjoy problems.
				<br /><br />
				I have worked with a number of technologies over time but tend to focus on full stack web development, either as an individual contributor or on a team.
				<br /><br />
				The rest of the time you'll find me <a class="text-muted" href="#hobbies">cooking</a>, 
				<a class="text-muted" data-toggle="modal" data-target="#modal-tinkering" href="#">tinkering</a> or maybe wrestling my <?=$this->dates->age(new \DateTime('2013-05-10'));?> year old son.
				<br /><br />
			</p>
		</div>

	</div>

	<a name="experience"></a>
	<h2>Work Experience</h2>

	<?php foreach($jobs as $job) { ?>
		<?php echo $this->view()->render(array('element' => 'templates/job'), array('job' => $job)); ?>
	<?php } ?>

	<br />
	<br />

	<a name="stackoverflow"></a>
	<h2><img src="https://i.imgur.com/pszAeGh.png" style="height: 50px;"/></h2>
	<hr />

	<div class="card card-inverse" style="background-color: #333; border-color: #333;">
		<div class="card-block">
			<small class="card-text" style="text-transform: uppercase;">Reputation</small>
			<h3 class="card-title"><?=number_format($stackoverflow_profile->reputation);?></h3>
			<small class="card-text" style="text-transform: uppercase;">Badges</small>
			<h5 class="card-text">
				<span class="label label-pill" style="text-shadow: 1px 1px 8px #5C5B5C; background-color: #fc0;"><?=number_format($stackoverflow_profile->badge_counts->gold);?></span>
				<span class="label label-pill label-default" style="text-shadow: 1px 1px 8px #5C5B5C;"><?=number_format($stackoverflow_profile->badge_counts->silver);?></span>
				<span class="label label-pill" style="text-shadow: 1px 1px 8px #5C5B5C; background-color: #c96;"><?=number_format($stackoverflow_profile->badge_counts->bronze);?></span>
			</h5>
			<small class="card-text" style="text-transform: uppercase;">Active Tags</small>
			<p>
				<?php foreach($stackoverflow_tags as $tag) {?>
				<span class="label label-pill label-default" title="<?=$tag->count;?> questions tagged with <?=$tag->name;?>"><?=$tag->name;?></span>
				<?php } ?>
			</p>
			<p class="card-text">Top 2% overall.</p>
			<a href="<?=$stackoverflow_profile->link;?>" target="_blank" class="btn btn-primary">View Profile</a>
		</div>
	</div>

	<br />
	<br />

	<a name="hobbies"></a>
	<h2>Hobbies</h2>
	<hr />
	<p>
		Does anyone really read this part of a resume? <br /><br />
		Anyhow, some of things I like to do other than work are: cooking (ask me about my Thai chicken tacos),
		tinkering with things the Intel Edison, Raspberry Pi or LEGOs (mostly to do silly things), playing Nintendo games (not exclusively, but often original NES cartridges),
		traveling and taking pictures, or just hanging out with my <?=$this->dates->age(new \DateTime('2013-05-10'));?> year old son.
	</p>
	<div class="text-xs-center">

		<?=$this->instagram->image("10903558_810687682335454_1574067848");?>
		<?=$this->instagram->image("11428667_1605648373039735_1587331116");?>
		<?=$this->instagram->image("11208336_371961903005151_1820012264");?>
		<?=$this->instagram->image("1661962_1758938354330452_1925912219");?>
		<?=$this->instagram->image("12230823_975208939189661_1032808936");?>
		<?=$this->instagram->image("10731672_1087228001304456_971164157");?>

	</div>

	<br />
	<br />

	<a name="contact"></a>
	<h2>Contact</h2>
	<hr />
	<p>
		You can contact me via <a href="mailto:justinjenkins@gmail.com">justinjenkins@gmail.com</a>
	</p>

	<br />
	<br />
	<br />
	<br />

	<!-- modals -->

	<div id="modal-tinkering" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-tinkering" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="embed-responsive embed-responsive-1by1" style="width:375px; height: 667px">
					<iframe width="375" height="667" src="https://www.youtube-nocookie.com/embed/x4vQAcUKm3k?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
