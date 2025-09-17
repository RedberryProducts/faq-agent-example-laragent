## Context

@forelse($documents as $doc)
- **Title:** {{ $doc->title }}
- **Body:** {{ $doc->body }}
@empty
    No relevant documents found.
@endforelse