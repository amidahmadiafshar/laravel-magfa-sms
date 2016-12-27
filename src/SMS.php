<?php
namespace Nopaad\Magfa;
use Illuminate\Notifications\Notification;
class SMS
{

	protected $recipient;
	protected $msg;


	public function send($notifiable, Notification $notification)
	{
		$message = $notification->toSms($notifiable);
		// Send notification to the $notifiable instance...
	}


	public function to($recipient)
	{
		if (config('laravel-magfa-sms.debug')) {
			$this->recipient = config('laravel-magfa-sms.debug_recipient_number');
		} else {
			$this->recipient = $recipient;
		}
		return $this;
	}


	public function text($msg)
	{
		$this->msg = $msg;
		return $this;
	}


	public function sendText()
	{
		\Log::info('sending text message (sms)',[
			'to'           => $this->recipient,
			'message'      => $this->msg,
		]);
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', \Config::get('laravel-magfa-sms.url'), [
			// 'debug' => true,
			'query' => [
				'service'      => 'enqueue',
				'username'     => \Config::get('laravel-magfa-sms.username'),
				'password'     => \Config::get('laravel-magfa-sms.password'),
				'domain'       => \Config::get('laravel-magfa-sms.domain'),
				'from'         => \Config::get('laravel-magfa-sms.from'),
				'to'           => $this->recipient,
				'message'      => $this->msg,
				'coding'       => '', // optional
				'udh'          => '', // optional
				'chkmessageid' => '', // optional
			]
		]);
		\Log::info('message has been sent');

		return $response;
	}
}