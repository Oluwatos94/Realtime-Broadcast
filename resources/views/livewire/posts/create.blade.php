<?php
use App\Events\PostCreated;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Facades\Auth; 
use Livewire\Component;

new class Create extends Component
{
    #[Validate('required|string|max:255|message: "Please enter a title."')] 
    public string $message = '';

    public function store(): void
    {
        $validate = $this->validate();

        // Create a post
        $post = Auth::user()->posts()->create($validate);

        // Dispatch the postCreated event
        event(new PostCreated($post));
        $this->message = '';

        // Dispatch a Livewire event
        $this->dispatch('post-created');
    }
}
?>



<div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
    <div class="d-flex flex-start w-100">
      <img class="rounded-circle shadow-1-strong me-3"
        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
        height="40" />
      <div data-mdb-input-init class="form-outline w-100">
        <textarea
        wire:model="message"
        placeholder="Write a comment..." 
        class="form-control" 
        id="post" rows="4"
        style="background: #fff;"></textarea>
        <label class="form-label" for="post">Post</label>
      </div>
    </div>
    <div class="float-end mt-2 pt-1">
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">
        Post comment
      </button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm">
        Cancel
      </button>
</div>
