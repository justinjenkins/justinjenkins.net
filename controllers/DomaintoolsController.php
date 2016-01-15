<?php

namespace app\controllers;

use app\models\Domaintools;

class DomaintoolsController extends \lithium\action\Controller {

	public function search($domain="domaintools.com") {

		$domaintools_search = Domaintools::search($domain);
		//$domaintools_whois = Domaintools::whois($domain);

		return $this->render(array('data' => compact('domain','domaintools_search'), 'layout' => 'resume'));
	}

	public function building() {
		return "coming soon";
	}

}

?>