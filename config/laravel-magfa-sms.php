<?php
return [
	/*
	|--------------------------------------------------------------------------
	| MAGFA SMS Configuration
	|--------------------------------------------------------------------------
	|
	*/
	'username' => env('MAGFASMS_USERNAME', 'username'),
	'password' => env('MAGFASMS_PASSWORD', 'password'),
	'domain' => env('MAGFASMS_DOMAIN', 'domain'),
	'url' => env('MAGFASMS_BASE_HTTP_URL', 'http://messaging.magfa.com/magfaHttpService?'),
	'error_max_value' => env('MAGFASMS_ERROR_MAX_VALUE', '1000'),
];