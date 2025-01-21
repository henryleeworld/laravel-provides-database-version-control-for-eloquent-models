<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    private $user;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getVersion() 
    {
        $user = $this->user->firstOrFail();
        echo __('Version number: ') . ($version = count($user->versions)) . PHP_EOL;
        echo __('Current user email: ') . $user->versions->last()->email . PHP_EOL;
        echo __('Update user email') . PHP_EOL;
        $user->email = "scarlett.johansson." . $version . "@henryleeworld.com";
        $user->save();
        $user = $user->refresh();
        echo __('Version number: ') .  count($user->versions) . PHP_EOL;
        echo __('Current user email: ') . $user->versions->first()->email . PHP_EOL;
    }
}
