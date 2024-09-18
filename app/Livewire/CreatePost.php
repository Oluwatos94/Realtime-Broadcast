<?php
namespace App\Livewire;

use App\Events\PostCreated;
use App\Models\Post;
use App\Livewire\Forms\PostForm;
use Illuminate\Support\Facades\Auth; 
use Livewire\Component;

class CreatePost extends Component
{

    public PostForm $form; 

    public string $message = '';

    public function store()
    {
        $this->validate();

        $post = Post::create([
            'user_id' => Auth::id(),
            $this->form->all() 
        ]);

        event(new PostCreated($post));

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
