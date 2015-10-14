<?php namespace Owlgrin\Spy;

use Illuminate\Support\ServiceProvider;
use Config;

class SpyServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Owlgrin\Spy\SpyClient\ClientInterface', function($app)
		{
			return $this->app->make(Config::get('spy::client'));
		});

		$this->app->singleton('spy', 'Owlgrin\Spy\Spy');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	public function boot()
	{
		$this->package('owlgrin/spy');
	}

}
