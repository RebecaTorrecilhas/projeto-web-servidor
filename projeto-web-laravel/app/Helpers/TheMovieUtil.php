<?php

namespace App\Helpers;

class TheMovieUtil {
	private static function getApiKey() {
		return config('app.tm_api_key');
	}

	private static function getUrl() {
		return config('app.tm_url');
	}

	private static function createCurl($method, $endpoint, $payload = null) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => self::getUrl() . $endpoint . 'api_key=' . TheMovieUtil::getApiKey(),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_POSTFIELDS => !empty($payload) ? json_encode($payload) : null,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);

		return json_decode($response ? $response : $error);
	}

	static public function getMovie($id) {
		return TheMovieUtil::createCurl('GET', "/movie/$id?");
	}

	static public function getMovies($search, $page) {
		return TheMovieUtil::createCurl('GET', "/search/movie?query=$search&page=$page&include_adult=false&");
	}

	static public function getPopulars() {
		return TheMovieUtil::createCurl('GET', '/movie/popular?');
	}
}
