<?php

namespace App\Livewire;

use App\Models\Book as ModelsBook;
use Livewire\Component;

class Book extends Component
{
    public $books, $name, $bookID, $bookUP;
    public $title = '';
    public $editBook = false;

    public function mount()
    {
        $this->books = ModelsBook::all();
    }

    public function render()
    {
        return view('livewire.book', [
            'books' => $this->books,
        ]);
    }

    public function store()
    {
        ModelsBook::create(['title' => $this->title]);
        $this->title = '';
        $this->books = ModelsBook::all();
    }

    public function edit($id)
    {
        $modelbook = ModelsBook::findOrFail($id);
        if ($modelbook) {
            $this->name = $modelbook->title;
            $this->bookID = $modelbook->id;
            $this->editBook = true;
        }
    }

    public function update()
    {
        $bookUP = ModelsBook::findOrFail($this->bookID);
        $bookUP->update([ 'title' => $this->name,]);
        $this->reset(['name','bookID']);
        $this->editBook = false;
        $this->books = ModelsBook::all();
    }
}
