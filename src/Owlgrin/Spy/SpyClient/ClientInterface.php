<?php namespace Owlgrin\Spy\SpyClient;


interface ClientInterface {

	public function init($type);

	public function createUser($userId, $user);

	public function createEvent($eventName, $userId, $metaData);

	public function getUsers();

}