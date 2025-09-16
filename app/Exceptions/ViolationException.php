<?php

namespace App\Exceptions;

use App\Enums\RuleViolation;
use Exception;

class ViolationException extends Exception
{
    public function __construct(RuleViolation $rule)
    {
        $message = $rule === RuleViolation::NoOffTopic
            ? 'Sorry, it is out of my competence'
            : 'Rule violated: ' . $rule->value;
        parent::__construct($message);
    }
}
