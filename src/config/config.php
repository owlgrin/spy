<?php

return array(
	'allow_analytics' => true,
	'client' => 'Owlgrin\Spy\SpyClient\IntercomService',
	'integrations' => [
		'users' => [
			'app_id'   => 'eawfwaw9',
			'api_key'  => '024ef8b4fcd2c5672b1dc8feb716a89fc7fcc563'
		],
		'consumers' => [
			'app_id'   => 'kxat51zy',
			'api_key'  => '196d9386c737c8c6c16bc02b0b89f149e5985bfa'
		]
	],
	'events' =>  array(
		'campaign_change_state',
		'campaign_copy',
		'campaign_create',
		'campaign_delete',
		'campaign_trigger',
		'campaign_update_horn',
		'campaign_update_basic',
		'delete_multiple_profiles',
		'delete_single_profile',
		'hook_called',
		'horn_to_profiles',
		'horn_to_ruleset',
		'update_app',
		'update_app_company',
		'update_app_to_default',
		'user_activated',
		'user_change_password',
		'user_create_app',
		'user_delete_app',
		'user_has_applied_widget',
		'user_login',
		'user_logout',
		'user_registered',
		'user_update',
		'webhook_create',
		'webhook_delete',
		'invite-friend',
		'profile_has_clicked_login',
		'profile_has_authorised_login',
		'consumer_register',
		'producthunt_login_attempt',
		'producthunt_login_authorize',
		'producthunt_login_refresh',
		'basecamp_login_attempt',
		'basecamp_login_authorize',
		'trello_login_attempt',
		'trello_login_authorize',
		'github_login_attempt',
		'github_login_authorize',
		'mailchimp_login_attempt',
		'mailchimp_login_authorize',
		'stripe_login_attempt',
		'stripe_login_authorize',
		'shopify_login_attempt',
		'shopify_login_authorize',
	),
	'user_meta_data' => [
		'user_id',
		'email',
		'company',
		'company_address'
	],
	'user_hook_data' => [
		// 'resource',
		'user_id',
		'url',
		'type'
	],

	'profile_has_applied_widget' => [
		'user_id',
		'app_id',
		'profile_uid'
	],
	'profile_has_clicked_login' => [
		'user_id',
		'app',
		'profile'
	],
	'consumer_meta_data' => [
		'avatar_url',
		'name'
	]

);