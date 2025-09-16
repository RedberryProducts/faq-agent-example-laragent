@php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Document[] $documents */
@endphp
<div class="flex h-screen">
    <!-- Left: Document Cards -->
    <div class="w-1/3 border-r bg-gray-50 p-4 overflow-y-auto">
        <div class="space-y-4">
            @foreach ($documents as $doc)
                <div wire:click="selectDocument({{ $doc->id }})" wire:key="doc-{{ $doc->id }}"
                    class="cursor-pointer bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition border border-gray-200">
                    <div class="font-semibold text-lg">{{ $doc->title }}</div>
                    <div class="text-gray-600 text-sm mt-1">{{ $doc->description }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Right: Document Body -->
    <div class="w-2/3 p-8 overflow-y-auto">
        @if ($selected)
            <div class="prose max-w-full">
                <h2 class="mb-2">{{ $selected->title }}</h2>
                <p class="text-gray-500 mb-4">{{ $selected->description }}</p>
                <hr class="mb-10">
                <div class="whitespace-pre-line text-lg">{{ $selected->body }}</div>
            </div>
        @else
            <div class="text-gray-400 text-center mt-24">Select a document to view its details.</div>
        @endif
    </div>
</div>
