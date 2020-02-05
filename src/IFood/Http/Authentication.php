<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:16
 */

namespace MatheusHack\IFood\Http;

use GuzzleHttp\Client;
use MatheusHack\IFood\Entities\Response;
use GuzzleHttp\Exception\RequestException;

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
	 * @param bool $isMultipart
	 * @return Response
	 */
	protected function execute($endpoint, $method = 'GET', $parameters = [], $isMultipart = false)
	{
		try {
			$token = $this->authorize();

			if(!$token)
				throw new \Exception('Token invalid');

			$endpoint = sprintf("%s%s", getenv('IFOOD_URL'), $endpoint);
			$content = $this->makeContent($token, $parameters, $isMultipart);

			switch ($method){
				default:
					$response = $this->httpClient->request('GET', $endpoint, $content);
					break;
				case 'POST':
					$response = $this->httpClient->request('POST', $endpoint, $content);
					break;
				case 'PUT':
					$response = $this->httpClient->request('PUT', $endpoint, $content);
					break;
				case 'PATCH':
					$response = $this->httpClient->request('PATCH', $endpoint, $content);
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
				case 401:
					$this->cache->clear('token_authorize_ifood');
					return $this->execute($endpoint, $method, $parameters, $isMultipart);
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
			if($e->getCode() == 401){
				$this->cache->clear('token_authorize_ifood');
				return $this->execute($endpoint, $method, $parameters, $isMultipart);
			}

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
	 * @param $parameters
	 * @param $isMultipart
	 * @return array
	 */
	private function makeContent($token, $parameters, $isMultipart)
	{
		if($isMultipart) {
			return [
				"headers" => [
					'Authorization' => sprintf("Bearer %s", $token)
				],
				'multipart' => $this->hasStringKeys($parameters) ? [$parameters] : $parameters
			];
		}

		return [
			"headers" => [
				'Content-Type' => 'application/json',
				'Authorization' => sprintf("Bearer %s", $token)
			],
			'body' => json_encode($parameters)
		];
	}

	/**
	 * @param array $data
	 * @return bool
	 */
	private function hasStringKeys(array $data)
	{
		return count(array_filter(array_keys($data), 'is_string')) > 0;
	}
}