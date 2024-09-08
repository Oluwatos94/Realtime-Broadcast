<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class CreatePost extends Component
{
    public $content = 'Post content...';

    public function render()
    {
        return view('livewire.create-post')->with([
            'author' => Auth::user()->name,
        ]);
    }
}
