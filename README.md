#justin jenkins dot net
Justin Jenkins' personal site and résumé ...

I have used the Lithium (http://li3.me) Framework to create this site, while it's simple it 
shows using:

* [MongoDB](#mongodb)
* [Stack Overflow API](#stackoverflow-api)
* Memcache
* [Models](models)
* [Views](views) 
* [Controllers](controllers/ResumeController.php)
* [Layouts](views/layouts/resume.html.php)
* [Elements](views/elements)
* [Helpers](extensions/helper/Instagram.php)
* HTTPS (TLS 1.2)

## MongoDB
I've used MongoDB to store an object repersenting each job I've had, since mongodb uses objects I was able to store data 
in various types such as strings and arrays. 

Here is an example document:

```json
{
  "_id": ObjectId("568f0b72bac526ed28e91090"),
  "company": "Subsplash",
  "summary": "A mobile focused content delivery company. We grew the company from roughly 100 clients to over 3,000 and from 50,000 app downloads to over 15 million.",
  "highlights": [
    "Worked with the Product Team to develop thousands & power millions of iOS, Android, and Windows Phone apps",
    "Led the Web Team in the development of a web based dashboard for on-the-fly app creation and updating",
    "Collaborated with the Design Team to create an advanced Bootstrap hybrid UI Kit for the app dashboard",
    "Devised an app analytics system tracking tens of millions of app interactions a day using MongoDB",
    "Joined forces with the Support, Sales and Finance Teams to develop a custom intranet and CRM system",
    "Helped move client signup from a time intensive manual system to a self service online signup process using Stripe",
    "Created a video/audio hosting and encoding system handling thousands of videos a week and TBs of traffic",
    "Delicately migrated legacy PHP code into a modern PHP MVC Framework (<a href=\"http://li3.me\" target=\"_blank\">Lithium</a>)",
    "Maintained and expanded server architecture from one shared server to 30+ Linux servers with 99.9% uptime"
  ],
  "term": "March 2011 - December 2015",
  "title": "Lead Web Developer",
    "tags": [
    "PHP",
    "MVC",
    "HTML",
    "CSS",
    "JS",
    "MySQL",
    "MongoDB",
    "Memcache",
    "git",
    "ffmpeg",
    "Stripe",
    "Linux",
    "Apache",
    "BASH",
    "Rackspace Cloud",
    "AWS"
  ],
"expanded_info": "Subsplash has developed a unique app creation platform for iOS, Android, Windows Phone and Apple TV. Clients can build their app via an intuitive web based dashboard and Subsplash handles the native code, app submission, updates, and etc. The majority of their client base is non-profit organizations and churches seeking to make their multimedia content avaible via mobile devices.\n\nAlong with mobile apps Subsplash also offers many related services such as video/audio hosting and encoding, web multimedia players and embeds as well as some design services.",
}
```

## View Elements
The MongoDB data is brought in and formatted/outputted into html via an `element` (a partial view) [`views/elements/templates/job.html.php`](`views/elements/templates/job.html.php)

#### Usage
```php
<?php foreach($jobs as $job) { ?>
	<?php echo $this->view()->render(array('element' => 'templates/job'), array('job' => $job)); ?>
<?php } ?>
```
#### View Element Source

```php
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
```

## Stackoverflow API

I wanted to show my Stackoverflow profile information but was disapointed with the available "flair" from Stackoverflow, so I made my own!

My custom widget brings in my score, badge counts as well the tags I've been most active on ...

![](https://5f4ddb0a0d68d2e04549-84f555cc2fb0b44c7c86d4ad83213885.ssl.cf5.rackcdn.com/stackoverflow_widget.png)

#### Code Example

The `Stackoverflow` Model method `me()` ([source](models/Stackoverflow.php)) brings back basic user data from the [Stack Exchange API](https://api.stackexchange.com/). 

This method caches the result with `memcache` for 2 hours so that rate limits are not exceeded, and the page loads faster.

```php
	public static function me() {

		if($cache = Cache::read('memcache', 'stackoverflow_me')) {
			return $cache;
		}

		$service = new Service(array('scheme' => 'https', 'host' => 'api.stackexchange.com', 'timeout' => 2));

		// using `userid` instead of `me` so we don't need to auth
		$data = $service->get('/'.self::API_VERSION.'/users/'.self::USERID.'?key='.self::KEY.'&site=stackoverflow');

		$me = self::response_to_object($data)->items[0];

		Cache::write('memcache', 'stackoverflow_me', $me, '+2 hours');

		return $me;
	}
```
