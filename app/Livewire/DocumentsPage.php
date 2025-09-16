<?php

namespace App\Livewire;

use Livewire\Component;

class DocumentsPage extends Component
{
    public $documents;
    public $selected = null;

    public function mount(): void
    {
        $this->documents = \App\Models\Document::all();
        $this->selected = null;
    }

    public function selectDocument($id): void
    {
        $this->selected = $this->documents->firstWhere('id', $id);
    }

    public function render()
    {
        return view('livewire.documents-page', [
            'documents' => $this->documents,
            'selected' => $this->selected,
        ])->layout('components.layouts.app');
    }
}
