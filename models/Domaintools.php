<?php
namespace app\models;

use lithium\storage\Cache;
use lithium\net\http\Service;

class Domaintools extends \lithium\data\Model {

	const API_HOST = "api.domaintools.com";
	const API_VERSION = "v1";

	/**
	 *
	 * Retrieves various basic information on a domain or IP.
	 *
	 * @param	string	$domain	Fully qualified domain name.
	 * @return	object	Returns various basic information on a domain.
	 */
	public static function search($domain) {

		if($cache = Cache::read('memcache', 'domaintools_search_'.$domain)) {
			return $cache;
		}

		$service = new Service(array('scheme' => 'https', 'host' => self::API_HOST, 'timeout' => 2));

		$data = $service->get('/'.self::API_VERSION.'/'.$domain);

		$data = json_decode($data);

		Cache::write('memcache', 'domaintools_search_'.$domain, $data->response, '+2 hours');

		return $data->response;
	}

	/**
	 *
	 * Retrieves domain who is information.
	 *
	 * @param	string	$domain	Fully qualified domain name or IP
	 * @return	object	Returns whois information for a domain.
	 */
	public static function whois($domain) {

		if($cache = Cache::read('memcache', 'domaintools_whois_'.$domain)) {
			return $cache;
		}

		$service = new Service(array('scheme' => 'https', 'host' => self::API_HOST, 'timeout' => 2));

		$data = $service->get('/'.self::API_VERSION.'/'.$domain.'/whois');

		$data = json_decode($data);

		Cache::write('memcache', 'domaintools_whois_'.$domain, $data->response, '+2 hours');

		return $data->response;
	}

}

?>