<?php

namespace App\Livewire;

use Livewire\Component;
use App\AiAgents\SupportAgent;
use App\AiAgents\GuardAgent;

class ChatPage extends Component
{
    public ?array $chatHistory = [
        [
            'role' => 'system',
            'content' => "Name yourself on every response, for example: 'I, Model [X] created by [Y], sending respond: [response]'"
        ]
    ];
    public ?string $message = '';
    public bool $isTyping = false;

    protected ?string $agent = SupportAgent::class;

    public function mount(): void
    {
        $this->setHistoryFromAgent();
    }

    public function sendMessage(): void
    {
        try {
            $this->validate(['message' => 'required|string']);

            GuardAgent::for('check_message')->respond($this->message);

            $this->isTyping = true;

            $this->getAgentInstance()->respond($this->message);
            $this->setHistoryFromAgent();
        } catch (\Exception $e) {
            $this->isTyping = false;
            $this->dispatch('notify', type: 'error', message: $e->getMessage());
        }
        $this->reset('message');
    }

    public function clearHistory(): void
    {
        $this->getAgentInstance()->clear();
        $this->setHistoryFromAgent();
    }

    public function getChatHistory(): array
    {
        return array_filter($this->chatHistory, fn($msg) => in_array($msg['role'], ['user', 'assistant']));
    }

    public function getSystemMessages(): array
    {
        return array_filter($this->chatHistory, fn($msg) => !in_array($msg['role'], ['user', 'assistant']));
    }

    protected function getAgentInstance()
    {
        $session = auth()->user() ? auth()->user()->id : session()->getId();
        return $this->agent::for($session);
    }

    protected function setHistoryFromAgent(): void
    {
        $this->chatHistory = $this->getAgentInstance()->chatHistory()->toArray();
    }

    public function render()
    {
        return view('livewire.chat-page', [
            'messages' => $this->getChatHistory(),
            'isTyping' => $this->isTyping,
        ]);
    }
}
