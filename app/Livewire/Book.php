<?php

namespace App\Livewire;

use App\Models\Book as ModelsBook;
use Livewire\Component;
use Livewire\Attributes\Url;

class Book extends Component
{
    public $books= [];
    public $name, $bookID, $bookUP;
    public $title = '';
    public $search = '';
    public $editBook = false;

    public function render()
    {
        $this->books = ModelsBook::query()
        ->where('title', 'like', '%' . $this->search . '%')
        ->get();

        return view('livewire.book', [
            'books' => $this->  books
        ]);
    }

    public function store()
    {
        ModelsBook::create(['title' => $this->title]);
        $this->title = '';
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
    }

}
