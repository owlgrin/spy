<?php namespace Owlgrin\Analytics;

use Owlgrin\Analytics\AnalyticClient\AnalyticInterface;
use Config;

class Analytics {

	protected $analyticMaker;
	protected $user;

	public function __construct(AnalyticInterface $analyticMaker)
	{
		$this->analyticMaker = $analyticMaker;
	}

	public function init($user, $type)
	{
		$this->analyticMaker = $this->analyticMaker->init($type);
		$this->user      = $user;

		return $this;
	}

	public function reinit($user, $type)
	{
		if($this->user) return;

		$this->init($user, $type);
	}

	public function getUsers()
	{
		return $this->analyticMaker->getUsers();
	}

	/**
	 * it stores user in analytics client
	 *
	 * @param  [array] $user [details of the user]
	 *
	 * @return [type]       [description]
	 */
	public function storeUser($meta)
	{
		return $this->analyticMaker->createUser($this->user, $meta);
	}

	/**
	 * create custom event for analytics
	 *
	 * @param  [array] $event [details of the event]
	 *
	 * @return [type]        [description]
	 */
	public function createEvent($eventName, $metaData)
	{
		//if event not in array then skip
		if( ! in_array($eventName, Config::get('analytics::events'))) return;

		return $this->analyticMaker->createEvent($eventName, $this->user, $metaData);
	}

}