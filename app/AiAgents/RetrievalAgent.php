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
        return "Compare user query to available documents and return IDs of documents that can be useful to answer current query";
    }

    public function prompt($message)
    {
        return view('prompts.retrieval_agent_prompt', [
            'query' => $message,
            'documents' => Document::select('id', 'title', 'description')->get(),
        ])->render();
    }

    public function structuredOutput()
    {
        return [
            'name' => 'documents',
            'schema' => [
                'type' => 'object',
                'properties' => [
                    'document_ids' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'description' => 'Document ID',
                        ],
                        'description' => 'array of document IDs'
                    ]
                ],
                'required' => ['document_ids'],
                'additionalProperties' => false,
            ],
            'strict' => true,
        ];
    }


}
