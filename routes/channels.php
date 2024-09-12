<?php
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('post', function ($user){
    return true;
});
