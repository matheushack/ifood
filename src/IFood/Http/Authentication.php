<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:16
 */

namespace MatheusHack\IFood\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use MatheusHack\IFood\Entities\Response;

/**
 * Class Authentication
 * @package MatheusHack\IFood\Http
 */
class Authentication
{
	/**
	 * @var Client
	 */
	private $httpClient;
	/**
	 * @var Cache
	 */
	private $cache;

	/**
	 * Authentication constructor.
	 */
	public function __construct()
	{
		$this->cache = new Cache();
		$this->httpClient = new Client();
	}

	/**
	 * @param $endpoint
	 * @param string $method
	 * @param array $parameters
	 * @return Response
	 */
	protected function execute($endpoint, $method = 'GET', $parameters = [])
	{
		try {
			$token = $this->authorize();

			if(!$token)
				throw new \Exception('Token invalid');

			$endpoint = sprintf("%s%s", getenv('IFOOD_URL'), $endpoint);

			switch ($method){
				default:
					$response = $this->httpClient->request('GET', $endpoint, [
						'headers' => $this->makeHeaders($token),
					]);
					break;
				case 'POST':
					$response = $this->httpClient->request('POST', $endpoint, [
						'headers' => $this->makeHeaders($token),
						'body' => json_encode($parameters)
					]);
					break;
				case 'PUT':
					$response = $this->httpClient->request('PUT', $endpoint, [
						'headers' => $this->makeHeaders($token),
						'body' => json_encode($parameters)
					]);
					break;
			}

			$iFoodResponse = json_decode($response->getBody());
			switch ($response->getStatusCode()){
				case 201:
					return (new Response)
						->setMessage('Parameters were successfully received')
						->setSuccess(true);
					break;
				case 202:
					return (new Response)
						->setMessage('Information was successfully entered')
						->setSuccess(true);
					break;
				case 400:
				case 401:
				case 403:
					throw new \Exception($iFoodResponse->message);
					break;
				case 429:
					throw new \Exception('Exceeded number of requests, try again later');
					break;
				case 429:
					throw new \Exception('Exceeded number of requests, try again later');
					break;
				case 500:
					throw new \Exception('An error occurred, try again later');
					break;
			}

			if(empty($iFoodResponse))
				return (new Response)
					->setMessage('Information was successfully')
					->setSuccess(true);

			return (new Response)
				->setSuccess(true)
				->setData($iFoodResponse);
		} catch (RequestException $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		} catch (\Exception $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @return bool|mixed
	 */
	protected function authorize()
	{
		$token = $this->cache->get('token_authorize_ifood');

		if($token)
			return $token;

		$tries = getenv('IFOOD_TOKEN_TRIES') ? getenv('IFOOD_TOKEN_TRIES') : 1;

		for($t = 1; $t <= $tries; $t++) {
			try {
				$response = $this->httpClient->request('POST', getenv('IFOOD_TOKEN_URL'), [
					'headers' => [
						'Content-Type' => 'application/x-www-form-urlencoded'
					],
					'form_params' => [
						'client_id' => getenv('IFOOD_CLIENT_ID'),
						'client_secret' => getenv('IFOOD_CLIENT_SECRET'),
						'grant_type' => 'password',
						'username' => getenv('IFOOD_USERNAME'),
						'password' => getenv('IFOOD_PASSWORD')
					]
				]);

				if($response->getStatusCode() != 200)
					throw new \Exception();

				$iFoodResponse = json_decode($response->getBody());
				$this->cache->set('token_authorize_ifood', $iFoodResponse->access_token, $iFoodResponse->expires_in);

				return $iFoodResponse->access_token;
			} catch (\Exception $e) {
				continue;
			}
		}

		return false;
	}

	/**
	 * @param $token
	 * @return array
	 */
	private function makeHeaders($token)
	{
		return [
			'Content-Type' => 'application/json',
			'Authorization' => sprintf("Bearer %s", $token)
		];
	}
}