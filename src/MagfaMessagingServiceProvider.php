<?php
namespace Nopaad\Magfa;
class MagfaMessagingServiceProvider extends \Illuminate\Support\ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../config/laravel-magfa-sms.php' => config_path('laravel-magfa-sms.php'),
		]);
	}


	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
