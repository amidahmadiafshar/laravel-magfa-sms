<?php
namespace Nopaad\Magfa;
class SMS
{

	public static function send($receipent_number)
	{
		$client = new GuzzleHttp\Client();
		$response = $client->request('GET', \Config::get('laravel-magfa-sms.php.url'), [
			'service'      => [ 'enqueue' ],
			'username'     => \Config::get('laravel-magfa-sms.php.username'),
			'password'     => \Config::get('laravel-magfa-sms.php.password'),
			'domain'       => \Config::get('laravel-magfa-sms.php.domain'),
			'from'         => \Config::get('laravel-magfa-sms.php.from'),
			'to'           => $receipent_number,
			'message'      => 'Test Radmand',
			'coding'       => '', // optional
			'udh'          => '', // optional
			'chkmessageid' => '', // optional
		]);

		return $response;
	}
}