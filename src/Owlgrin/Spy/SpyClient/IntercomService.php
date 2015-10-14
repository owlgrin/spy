<?php namespace Owlgrin\Spy\SpyClient;

use Owlgrin\Spy\SpyClient\ClientInterface;
use Owlgrin\Spy\Errors as SpyError;

use Intercom\IntercomBasicAuthClient;
use Intercom\Exception as IntercomException;

use Config, Carbon\Carbon;

class IntercomService implements ClientInterface {

	protected $spy;

	/**
	 * initializing the app
	 *
	 * @return [type] [description]
	 */
	public function init($type)
	{
		try
		{
			$this->spy = IntercomBasicAuthClient::factory(array(
				    'app_id' => Config::get("spy::integrations.$type.app_id"),
				    'api_key' => Config::get("spy::integrations.$type.api_key")
				));

			return $this;
		}
		catch(IntercomException\ClientErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(IntercomException\ServerErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(Exception $e)
		{
			$this->handleError($e);
		}
	}

	public function createUser($userId, $user)
	{
		try
		{
			$this->spy->createUser(array_merge(['user_id' => $userId], $user));
		}
		catch(IntercomException\ClientErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(IntercomException\ServerErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(Exception $e)
		{
			$this->handleError($e);
		}
	}

	public function createEvent($eventName, $userId, $metaData)
	{
		try
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

			$this->spy->createEvent($event);
		}
		catch(IntercomException\ClientErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(IntercomException\ServerErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(Exception $e)
		{
			$this->handleError($e);
		}
	}

	public function getUsers()
	{
		try
		{
			return $this->spy->getUsers();
		}
		catch(IntercomException\ClientErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(IntercomException\ServerErrorResponseException $e)
		{
			$this->handleError($e);
		}
		catch(Exception $e)
		{
			$this->handleError($e);
		}
	}

	private function handleError($e)
	{
		$error = $e->getErrors();
		$message = $error[0]['message'];
		$type = $error[0]['code'];

		$code = $e->getResponse()->getStatusCode();

		switch($code)
		{
			case 400:
				throw new SpyError\InvalidRequestError($message, $code, $type);
				break;

			case 401:
				throw new SpyError\AuthenticationError($message, $code, $type);
				break;

			case 403:
				throw new SpyError\ForbiddenError($message, $code, $type);
				break;

			case 404:
				throw new SpyError\NotFoundError($message, $code, $type);
				break;

			case 500:
				throw new SpyError\ServiceError($message, $code, $type);
				break;

			default:
				throw new SpyError\Error($message, $code, $type);
		}
	}

}