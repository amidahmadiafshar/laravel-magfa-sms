<?php
namespace Nopaad\Magfa;
class SMS
{

	public static function send($receipent_number)
	{
		$client = new GuzzleHttp\Client();
		$response = $client->request('GET', \Config::get('magfa-sms.url'), [
			'service'      => [ 'enqueue' ],
			'username'     => \Config::get('magfa-sms.username'),
			'password'     => \Config::get('magfa-sms.password'),
			'domain'       => \Config::get('magfa-sms.domain'),
			'from'         => \Config::get('magfa-sms.from'),
			'to'           => $receipent_number,
			'message'      => 'Test Radmand',
			'coding'       => '', // optional
			'udh'          => '', // optional
			'chkmessageid' => '', // optional
		]);

		return $response;
	}
}