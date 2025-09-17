<?php

namespace App\Services;

class RequestManager
{
	/**
	 * @param \LarAgent\Core\Contracts\ChatHistory $chatHistory
	 * @param string $email
	 * @return string
	 */
	public static function send($chatHistory, string $email): string
	{
		// Here you would handle the request logic
		return 'Request sent to manager and will contact you at ' . $email . ' shortly.';
	}
}
