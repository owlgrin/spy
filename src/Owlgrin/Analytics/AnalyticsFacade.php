<?php namespace Owlgrin\Analytics;

use Illuminate\Support\Facades\Facade;

/**
 * The Cashew Facade
 */
class AnalyticsFacade extends Facade
{
	/**
	 * Returns the binding in IoC container
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'analytics';
	}
}