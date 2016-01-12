<?php
namespace app\models;

use lithium\storage\Cache;
use lithium\net\http\Service;

class Stackoverflow extends \lithium\data\Model {

	const KEY = "aW4Z8bl6bujr8ZZPSHzvfA(("; // @note: This is not considered a secret.
	const API_VERSION = "2.2";
	const USERID = 296167;

	/**
	 *
	 * Retrieve my Stackoverflow user profile, equivalent to the users `me` endpoint.
	 *
	 * @return	object	Returns a user profile object.
	 */
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

	/**
	 *
	 * Retrieve Stackoverflow tags I am active on, equivalent to the users tags `me` endpoint.
	 *
	 * @param	int		$min	Stackoverflow `min`
	 * @return	object	Returns an array user tags objects.
	 */
	public static function me_tags($min=5) {

		if($cache = Cache::read('memcache', 'stackoverflow_me_tags')) {
			return $cache;
		}

		$service = new Service(array('scheme' => 'https', 'host' => 'api.stackexchange.com', 'timeout' => 2));

		// using `userid` instead of `me` so we don't need to auth
		$data = $service->get('/'.self::API_VERSION.'/users/'.self::USERID.'/tags?key='.self::KEY.'&order=desc&min='.$min.'&sort=popular&site=stackoverflow');

		$me_tags = self::response_to_object($data)->items;

		Cache::write('memcache', 'stackoverflow_me_tags', $me_tags, '+2 hours');

		return $me_tags;
	}

	/**
	 *
	 * Stackoverflow uses compressed JSON responses, see: https://api.stackexchange.com/docs/compression
	 *
	 * This function will turn those responses into a standard PHP object.
	 *
	 * @param	string	$response	Stackoverflow response
	 * @return	object	Returns a standard PHP object.
	 */
	private function response_to_object($response) {
		return (object) json_decode(gzdecode($response));
	}

}

?>