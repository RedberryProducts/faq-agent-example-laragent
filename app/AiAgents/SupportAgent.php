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

    protected User $user;

    public function instructions()
    {
        return view("prompts.support_agent_instructions", 
        [
            'date' => now()->toDateTimeString(),
            'user' => $this->user,
        ])->render();
    }

    public function prompt($message)
    {
        $docsId = RetrievalAgent::for("return_ids")->respond($message);
        $docs = Document::whereIn('id', $docsId['document_ids'])->get();
        $devMsg = new DeveloperMessage(view('prompts.support_agent_context', [
            'documents' => $docs,
        ])->render());
        $this->chatHistory()->addMessage($devMsg);

        return $message;
    }

    protected function onInitialize()
    {
        $this->user = TestUser::get();
    }

    #[Tool('Request contact to manager. Use only when explicitly requested to contact to manager')]
    public function requestContactToManager() {
        return RequestManager::send($this->chatHistory(), $this->user->email);
    }

}
