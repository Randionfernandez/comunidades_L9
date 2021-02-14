<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

<<<<<<< HEAD
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
=======
Broadcast::channel('App.User.{id}', function ($user, $id) {
>>>>>>> d7b36bbefd2c49b64ba9be84858b50028599f384
    return (int) $user->id === (int) $id;
});
