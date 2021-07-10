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
        echo '版本號：' . count($user->versions) . PHP_EOL;
        echo '目前使用者電子郵件：' . $user->versions->last()->email . PHP_EOL;
        echo '更新使用者電子郵件' . PHP_EOL;
        $user->email = "scarlett.johansson@henryleeworld.com";
        $user->save();
        $user = $user->refresh();
        echo '版本號：' . count($user->versions) . PHP_EOL;
        echo '目前使用者電子郵件：' . $user->versions->first()->email . PHP_EOL;
    }
}
