<?php

namespace app\controllers;

use app\models\Jobs;
use app\models\Stackoverflow;

class ResumeController extends \lithium\action\Controller {

	public function index() {

		$jobs = Jobs::all();
		$stackoverflow_profile = Stackoverflow::me();
		$stackoverflow_tags = Stackoverflow::me_tags();

		return $this->render(array('data' => compact('jobs','stackoverflow_profile','stackoverflow_tags'), 'layout' => 'resume'));
	}

	public function building() {
		return "coming soon";
	}

}

?>