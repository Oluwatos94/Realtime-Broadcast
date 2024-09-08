<?php
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Post;

new class CreatePost extends Component
{
    #[Validate('required|string|max:255')] 
    public $message = '';

    public function store()
    {
        $validate = $this->validate();

        // Create a post
        $post = auth->user()->posts()->create($validate);

        // Dispatch the postCreated event
        event(new PostCreated($post));
        $this->message = '';

        // Dispatch a livewire event
        $this->dispatch('post-created');
    }
}



?>


<div class="mb-3">
    <form wire:submit="store"> 
        <label for="create-post" class="form-label">Create a post</label>
        <textarea
        wire:model="message"
        placeholder="What's on your mind?"
        class="form-control" 
        id="create-post"
        rows="3">
        </textarea>
        <button type="submit">Create</button>
    </form>
</div>
