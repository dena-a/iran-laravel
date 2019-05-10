<?php

namespace Dena\IranLaravel;

use Illuminate\Support\ServiceProvider;

class IranLaravelServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'iran_laravel');
		
		$this->publishes([
			__DIR__.'/../resources/lang/fa/auth.php' => resource_path('lang/fa/auth.php'),
			__DIR__.'/../resources/lang/fa/pagination.php' => resource_path('lang/fa/pagination.php'),
			__DIR__.'/../resources/lang/fa/passwords.php' => resource_path('lang/fa/passwords.php'),
			__DIR__.'/../resources/lang/fa/validation.php' => resource_path('lang/fa/validation.php'),
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