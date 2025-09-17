# Task

Compare user query to available documents and return IDs 
of documents that can be useful to answer current query.
Important: If no documents are useful, return an empty array.

## User Query

{{ $query }}

## Documents

@foreach ($documents as $doc)

### Document ID: {{ $doc->id }}
Title: {{ $doc->title }}
Description: {{ $doc->description }}

@endforeach