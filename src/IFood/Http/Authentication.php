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

class Authentication
{
	private $httpClient;
	private $cache;

	public function __construct()
	{
		$this->cache = new Cache();
		$this->httpClient = new Client();
	}

	protected function execute($endpoint, $method = 'GET', $parameters)
	{
		try {
			$token = $this->authorize();

			if(!$token)
				throw new \Exception('Token invalid');

			$response = $this->httpClient->request($method, $endpoint, [
				'headers' => [],
				'body' => json_encode($parameters)
			]);

			return (new Response)
				->setSuccess(true)
				->setData(json_decode($response->getBody()));
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

	protected function authorize()
	{
		$token = $this->cache->get('token_authorize_ifood');

		if($token)
			return $token;

		$tries = getenv('TOKEN_TRIES') ? getenv('TOKEN_TRIES') : 1;

		for($t = 1; $t <= $tries; $t++) {
			try {
				$response = $this->httpClient->request('POST', getenv('URL_TOKEN'), [
					'headers' => [
						'Content-Type' => 'multipart/form-data'
					],
					'body' => json_encode([
						'client_id' => getenv('CLIENT_ID'),
						'client_secret' => getenv('CLIENT_SECRET'),
						'grant_type' => 'password',
						'username' => getenv('USERNAME'),
						'password' => getenv('PASSWORD'),
					])
				]);

				dd($response->getBody());
			} catch (\Exception $e) {
				continue;
			}
		}

		return false;
	}
}