<?php
$tags_extended = (object) [
	'PHP'      => (object) ['color' =>'primary'],
	'ASP.NET'  => (object) ['color' =>'primary'],
	'ASP'      => (object) ['color' =>'primary'],
	'Perl'     => (object) ['color' =>'primary'],
	'MVC'      => (object) ['color' =>'primary'],

	'HTML'     => (object) ['color' =>'warning'],
	'CSS'      => (object) ['color' =>'warning'],
	'JS'       => (object) ['color' =>'warning'],

	'MySQL'    => (object) ['color' =>'success'],
	'TSQL'     => (object) ['color' =>'success'],
	'MongoDB'  => (object) ['color' =>'success'],
	'Memcache' => (object) ['color' =>'success'],
	'Oracle'   => (object) ['color' =>'success'],
	'LDAP'     => (object) ['color' =>'success'],
	'SQL Server' => (object) ['color' =>'success'],

	'git'      => (object) ['color' =>'default'],
	'ffmpeg'   => (object) ['color' =>'default'],
	'Stripe'   => (object) ['color' =>'default'],
	'TFS'      => (object) ['color' =>'default'],
	'Authorize.Net' => (object) ['color' =>'default'],

	'Linux'    => (object) ['color' =>'danger'],
	'Windows'  => (object) ['color' =>'danger'],
	'FreeBSD'  => (object) ['color' =>'danger'],
	'Sun'      => (object) ['color' =>'danger'],
	'MacOS'    => (object) ['color' =>'danger'],
	'Apache'   => (object) ['color' =>'danger'],
	'IIS'      => (object) ['color' =>'danger'],
	'BASH'     => (object) ['color' =>'danger'],
	'AWS'      => (object) ['color' =>'danger'],
	'SQL Reports'     => (object) ['color' =>'danger'],
	'Crystal Reports' => (object) ['color' =>'danger'],
	'Rackspace Cloud' => (object) ['color' =>'danger'],
]; ?>

<p>
	<?php foreach($tags as $tag) { ?>
	<span class="label label-<?=$tags_extended->{$tag}->color;?>"><?=$tag;?></span>
	<?php } ?>
</p>