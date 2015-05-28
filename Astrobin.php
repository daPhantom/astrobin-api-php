<?php namespace AstroBin;

class Astrobin {

	private static function _curl($call) {
		$url = 'http://www.astrobin.com/api/v1/%s&api_key=%s&api_secret=%s&format=json';
		$url = sprintf($url, $call, env('ASTROBIN_API_KEY'), env('ASTROBIN_API_SECRET'));

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		return json_decode($result, true);
	}

	public static function imagesBySubject($subject, $limit = 24) {
		$call = sprintf('image/?subjects=%s&limit=%d', $subject, $limit);
		return self::_curl($call);
	}
}