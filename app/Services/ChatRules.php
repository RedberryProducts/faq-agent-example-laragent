<?php

namespace App\Services;

class ChatRules
{
	public static function getRules(): string
	{
		$path = base_path('RULES.md');
		return file_exists($path) ? file_get_contents($path) : '';
	}
}
