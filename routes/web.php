
<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DocumentsPage;
use App\Livewire\ChatPage;

Route::get('/', ChatPage::class);

Route::get('/documents', DocumentsPage::class);
