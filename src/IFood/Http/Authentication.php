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

	public function __construct()
	{
		$this->httpClient = new Client();
	}

	protected function execute($endpoint, $method = OAUTH_HTTP_METHOD_GET, $parameters)
	{
		Cache::set('teste', 'matheus', 30);
		dd(Cache::get('teste'));
		$token = $this->authorize();

		try {
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
		try {
			$token = Cache::get('token_authorize_ifood');

			if($token)
				return $token;

			$response = $this->httpClient->post(getenv('URL_TOKEN'), [
				'headers' => [
					'Content-Type' => 'multipart/form-data'
				],
				'multipart' => [
					'client_id' => getenv('CLIENT_ID'),
					'client_secret' => getenv('CLIENT_SECRET'),
					'grant_type' => 'password',
					'username' => getenv('USERNAME'),
					'password' => getenv('PASSWORD'),
				]
			]);

			dd($response->getBody());
		}catch(RequestException $e){
			dd($e->getMessage());
		}catch(\Exception $e){
			dd($e->getMessage());
		}
	}
}