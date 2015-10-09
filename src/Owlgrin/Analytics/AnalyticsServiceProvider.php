<?php namespace Owlgrin\Analytics;

use Illuminate\Support\ServiceProvider;
use Config;

class AnalyticsServiceProvider extends ServiceProvider {

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
		$this->app->bind('Owlgrin\Analytics\AnalyticClient\AnalyticInterface', function($app)
		{
			return $this->app->make(Config::get('analytics::analytic'));
		});

		$this->app->singleton('analytics', 'Owlgrin\Analytics\Analytics');
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
		$this->package('owlgrin/analytics');
	}

}
