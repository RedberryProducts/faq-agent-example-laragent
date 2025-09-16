<?php

namespace App\Livewire;

use Livewire\Component;

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
    protected ?string $agent = null;

    public function mount(): void
    {
        $this->setHistoryFromAgent();
    }

    public function sendMessage(): void
    {
        try {
            $this->validate(['message' => 'required|string']);
            // Add test message
            $this->chatHistory[] = [
                'role' => 'user',
                'content' => $this->message,
            ];
            $this->isTyping = true;

            // $this->getAgentInstance()->respond($this->message);
            // $this->setHistoryFromAgent();

            // Simulate latency
            sleep(1);

            // Add test response
            $this->chatHistory[] = [
                'role' => 'assistant',
                'content' => 'Test message from LarAgent.',
            ];
        } catch (\Exception $e) {
            $this->isTyping = false;
            $this->dispatch('notify', type: 'error', message: $e->getMessage());
        }
        $this->reset('message');
    }

    public function clearHistory(): void
    {
        // $this->getAgentInstance()->clear();
        // $this->setHistoryFromAgent();

        // For now, keep empty
        $this->chatHistory = [];
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
        // return $this->agent::forUser(auth()->user());
        return null;
    }

    protected function setHistoryFromAgent(): void
    {
        // $this->chatHistory = $this->getAgentInstance()->chatHistory()->toArray();
        // For now, keep default system message
        $this->chatHistory = [
            [
                'role' => 'system',
                'content' => "Name yourself on every response, for example: 'I, Model [X] created by [Y], sending respond: [response]'"
            ]
        ];
    }

    public function render()
    {
        return view('livewire.chat-page', [
            'messages' => $this->getChatHistory(),
            'isTyping' => $this->isTyping,
        ]);
    }
}
