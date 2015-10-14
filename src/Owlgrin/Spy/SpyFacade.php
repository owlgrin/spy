<?php namespace Owlgrin\Spy;

use Illuminate\Support\Facades\Facade;

/**
 * The Cashew Facade
 */
class SpyFacade extends Facade
{
	/**
	 * Returns the binding in IoC container
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'spy';
	}
}