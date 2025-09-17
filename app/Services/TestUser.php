<?php

namespace App\Services;

use App\Models\User;

class TestUser
{
	public static function get(): User
	{
		$user = new User();
		$user->email = 'JohnDoe@email.com';
		$user->name = 'John Doe';
		return $user;
	}
}
