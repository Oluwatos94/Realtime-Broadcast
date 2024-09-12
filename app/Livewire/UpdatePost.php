<?php

namespace App\Livewire;

use App\Events\PostCreated;
use App\Livewire\Forms\PostForm;
use Livewire\Component;
use App\Models\Post;


class UpdatePost extends Component
{
    public PostForm $form;
    public string $message = '';

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('post-updated');
    }

    public function cancel():void 
    {
        $this->dispatch('post-edit-cancelled');
    }

    public function render()
    {
        return view('livewire.update-post');
    }
}
