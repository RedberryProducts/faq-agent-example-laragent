<?php

namespace App\AiAgents;

use LarAgent\Agent;
use App\Services\ChatRules;
use LarAgent\Attributes\Tool;
use App\Enums\RuleViolation;
use App\Exceptions\ViolationException;
use Illuminate\Support\Facades\Log;

class GuardAgent extends Agent
{
    protected $model = 'gpt-4.1-mini';

    protected $history = 'in_memory';

    protected $provider = 'default';

    public function instructions()
    {
        $rules = ChatRules::getRules();
        return view('prompts.guard_agent_instructions', [
            "rules" => $rules
        ])->render();
    }

    public function prompt($message)
    {
        return $message;
    }

    #[Tool('Indicate that a rule has been violated. Use only when a rule is violated.')]
    public static function violationDetected(RuleViolation $rule, string $comment): string
    {
        Log::warning("Rule violated: {$rule->value}. Comment: {$comment}");
        throw new ViolationException($rule);
    }

}
