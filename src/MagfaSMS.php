<?php
namespace nopaad\Magfa;
class SMS
{

	private $credentials = [
		'username'        => null,
		'password'        => null,
		'domain'          => null,
		'url'             => null,
		'error_max_value' => null,
	];


	public function __construct()
	{
		$credentials = collect($credentials);
		if ($credentials->isEmpty() === false) {
			$this->credentials = collect($credentials)->only([
				'username',
				'password',
				'domain',
				'url',
				'error_max_value'
			]);
		} else {
			$this->loadCredentialsFromConfig();
		}
	}


	protected function loadCredentialsFromConfig()
	{
		$this->credentials['username'] = config('laravel-magfa-sms.username');
		$this->credentials['password'] = config('laravel-magfa-sms.password');
		$this->credentials['domain'] = config('laravel-magfa-sms.domain');
		$this->credentials['url'] = config('laravel-magfa-sms.url');
		$this->credentials['error_max_value'] = config('laravel-magfa-sms.error_max_value');

		return $this;
	}
}