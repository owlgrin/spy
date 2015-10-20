<?php

return array(
	/**
	 * If you want to track events
	 */
	'track_internal_events' => true,

	/**
	 * Spy client which you want to use
	 */
	'client' => 'Owlgrin\Spy\SpyClient\IntercomService',

	/**
	 * integrations which you want to use
	 */
	'integrations' => [
		'users' => [
			'app_id'   => 'Your Key',
			'api_key'  => 'Your Secret'
		]
	],

	/**
	 * List of events which you want to track
	 */
	'trackable_events' => []

);