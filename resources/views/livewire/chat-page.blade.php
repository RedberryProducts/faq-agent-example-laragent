@php
/** @var array $messages */
@endphp
<div class="flex flex-col h-[70vh] max-h-[70vh] bg-gray-50">
    <!-- Notification Area -->
    <div x-data="{ show: false, message: '', type: 'success' }" 
         x-on:notify.window="show = true; message = $event.detail.message; type = $event.detail.type; setTimeout(() => show = false, 5000)"
         x-on:click="show = false"
         x-show="show" 
         x-transition
         class="fixed top-4 right-4 z-50 px-4 py-2 rounded-lg shadow-lg text-white cursor-pointer"
         :class="{ 'bg-red-500': type === 'error', 'bg-green-500': type === 'success', 'bg-blue-500': type === 'info' }">
        <span x-text="message"></span>
    </div>
    <!-- Header with Clear History Button -->
    <div class="flex justify-end p-4 border-b bg-white">
        <button wire:click="clearHistory" 
                onclick="return confirm('Are you sure you want to clear the chat history?')"
                class="px-4 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
            Clear History
        </button>
    </div>
    <div class="flex-1 overflow-y-auto p-6">
        <!-- System Messages Panel -->
        <details class="border rounded-lg overflow-hidden mb-4">
            <summary class="px-4 py-2 bg-gray-50 cursor-pointer hover:bg-gray-100 font-medium text-sm">
                System Messages
            </summary>
            <div class="p-4 bg-white border-t">
                @foreach($this->getSystemMessages() as $message)
                    <div class="text-xs text-gray-600 mb-2">
                        <strong class="font-mono uppercase text-gray-500">{{ $message['role'] }}:</strong>
                        <p class="mt-1 font-sans">
                            @if(isset($message['content']))
                                {{ $message['content'][0]['text'] ?? $message['content'] }}
                            @else
                                {{ json_encode($message, JSON_PRETTY_PRINT) }}
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        </details>
        <div class="space-y-4">
            @foreach ($messages as $msg)
                @if ($msg['role'] === 'user')
                    <div class="w-full flex justify-end">
                        <div class="max-w-lg px-4 py-2 rounded-lg shadow bg-blue-500 text-white">
                            {{ $msg['content'][0]['text'] ?? $msg['content'] }}
                        </div>
                    </div>
                @elseif ($msg['role'] === 'assistant')
                    <div class="w-full flex justify-start">
                        <div class="max-w-lg px-4 py-2 rounded-lg shadow bg-white text-gray-800 border">
                            {!! nl2br($msg['content'][0]['text'] ?? $msg['content']) !!}
                        </div>
                    </div>
                @endif
            @endforeach
            <div wire:loading wire:target="sendMessage" class="w-full flex justify-start">
                <div class="max-w-lg px-4 py-2 rounded-lg shadow bg-white text-gray-400 border animate-pulse">
                    <span class="inline-block">LarAgent is typing<span class="animate-bounce">...</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 border-t">
        <form wire:submit.prevent="sendMessage" class="flex">
            <input type="text" wire:model.defer="message" placeholder="Type your message..." class="flex-1 px-4 py-2 border rounded-l focus:outline-none" />
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-r hover:bg-blue-700">Send</button>
        </form>
    </div>
</div>
