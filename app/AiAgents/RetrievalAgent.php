<?php

namespace App\AiAgents;

use LarAgent\Agent;
use App\Models\Document;

class RetrievalAgent extends Agent
{
    protected $model = 'gpt-4.1-mini';

    protected $history = 'in_memory';

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
