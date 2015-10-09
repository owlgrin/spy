<?php namespace Owlgrin\Analytics\AnalyticClient;

use Owlgrin\Analytics\AnalyticClient\AnalyticInterface;
use Intercom\IntercomBasicAuthClient;
use Config;
use Carbon\Carbon;

class IntercomAnalytic implements AnalyticInterface {

	protected $analytics;

	/**
	 * initializing the app
	 *
	 * @return [type] [description]
	 */
	public function init($type)
	{
		$this->analytics = IntercomBasicAuthClient::factory(array(
			    'app_id' => Config::get("analytics::integrations.$type.app_id"),
			    'api_key' => Config::get("analytics::integrations.$type.api_key")
			));

		return $this;
	}

	public function createUser($userId, $user)
	{
		$this->analytics->createUser(array_merge(['user_id' => $userId], $user));
	}

	public function createEvent($eventName, $userId, $metaData)
	{
		$event = [
			'event_name' => $eventName,
			'created_at' => Carbon::now()->timestamp,
			'user_id' => $userId
		];

		if( ! empty($metaData))
		{
			$event['metadata'] = $metaData;
		}

		$this->analytics->createEvent($event);
	}

	public function getUsers()
	{
		return $this->analytics->getUsers();
	}

}