<?php

namespace app\extensions\helper;

class Instagram extends \lithium\template\Helper {

	public function image($id,$width=640,$height=640) {

		return '<img class="img-thumbnail instagram-tumb" src="https://scontent-sea1-1.cdninstagram.com/hphotos-xap1/t51.2885-15/s'.$height.'x'.$width.'/sh0.08/e35/'.$id.'_n.jpg" alt="">';
	}
}

?>