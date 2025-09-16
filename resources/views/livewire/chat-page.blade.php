@php
/** @var array $messages */
@endphp
<div class="flex flex-col h-[70vh] max-h-[70vh] bg-gray-50">
    <div class="flex-1 overflow-y-auto p-6">
        <div class="space-y-4">
            @foreach ($messages as $msg)
                @if ($msg['role'] === 'user')
                    <div class="w-full flex justify-end">
                        <div class="max-w-lg px-4 py-2 rounded-lg shadow bg-blue-500 text-white">
                            {{ $msg['content'] }}
                        </div>
                    </div>
                @elseif ($msg['role'] === 'assistant')
                    <div class="w-full flex justify-start">
                        <div class="max-w-lg px-4 py-2 rounded-lg shadow bg-white text-gray-800 border">
                            {{ $msg['content'] }}
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
    <form wire:submit.prevent="sendMessage" class="bg-white p-4 border-t flex">
        <input type="text" wire:model.defer="message" placeholder="Type your message..." class="flex-1 px-4 py-2 border rounded-l focus:outline-none" />
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-r hover:bg-blue-700">Send</button>
    </form>
</div>
