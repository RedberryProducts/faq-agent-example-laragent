<?php

namespace App\AiAgents;

use LarAgent\Agent;
use LarAgent\Attributes\Tool;
use LarAgent\Messages\DeveloperMessage;
use App\AiAgents\RetrievalAgent;
use App\Models\User;
use App\Models\Document;
use App\Services\TestUser;
use App\Services\RequestManager;

class SupportAgent extends Agent
{
    protected $model = 'gpt-4.1';

    protected $history = 'file';

    protected $provider = 'default';

    public function instructions()
    {
        return "You are a helpful assistant...";
    }

    public function prompt($message)
    {
        return $message;
    }
}
