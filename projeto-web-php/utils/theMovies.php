<?php
class theMovies  {
    private static function getDominio(){
        return "https://api.themoviedb.org/3";
    }

    static function createCurl($method, $endpoint, $payload) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => self::getDominio() . $endpoint,
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

		return $response ? json_decode($response) : $error;
	}
}
