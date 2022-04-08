<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
    /**
     * Get user actual
     *
     * @return void
     */
    public function me()
    {
        return response()->json(
            ["sucesso" => "deu certo"]
        );
    }

    /**
     * Get list of users
     *
     * @return void
     */
    public function getUsers()
    {
        return response()->json(
            User::all()
        );
    }
}