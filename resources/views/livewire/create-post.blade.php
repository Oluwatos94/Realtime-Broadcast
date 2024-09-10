

<div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
<div class="d-flex flex-start w-100">
    <img class="rounded-circle shadow-1-strong me-3"
    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40" height="40" />

    <!-- Livewire Form -->
    <form wire:submit.prevent="store" class="w-100">
    <div data-mdb-input-init class="form-outline w-100">
        <label class="form-label" for="post">Post</label>
        <textarea
        wire:model="message"
        placeholder="Write a comment..." 
        class="form-control" 
        id="post" rows="4"
        style="background: #fff;"></textarea>
        <div>
            @error('message') <span class="error">{{ $message }}</span> @enderror 
        </div>
    </div>

    <div class="float-end mt-2 pt-1">
        <!-- Submit Button inside the form -->
        <button type="submit" class="btn btn-primary btn-sm">
        Post comment
        </button>
        <button type="button" class="btn btn-outline-primary btn-sm" wire:click="clearMessage">
        Cancel
        </button>
    </div>
    </form>
</div>
</div>
    