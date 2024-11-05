<?php

namespace App\Livewire;

use App\Models\Book as ModelsBook;
use Livewire\Component;
use Illuminate\Http\Request;

class Book extends Component
{
    public function store(Request $request)
    {
        ModelsBook::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);

        $this->reset();
    }
    public function render()
    {
        return view('livewire.book');
    }
}
