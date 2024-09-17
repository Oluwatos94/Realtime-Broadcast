<?php
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('post', function ($user){
    return true;
});
