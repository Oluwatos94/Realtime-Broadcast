<?php

namespace App\Livewire\Forms;

use App\Events\PostCreated;
use App\Models\Post;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth; 
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post;

    #[Validate('required|string|max:255|message: "Please enter a message."')]
    public string $message = '';

    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->message = $post->message;
    }

    public function update()
    {
        $this->validate();

        $post = Post::create([
            'user_id' => Auth::id(),
            $this->post->all() 
        ]);

        event(new PostCreated($post));

        $this->message = '';
    }
}
