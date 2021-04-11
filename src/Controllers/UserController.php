<?php


namespace App\Controllers;

use App\Helper;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public static $user = null;

    public function login()
    {
        $request = Request::capture();
        if ($request->post()) {
            $user = User::where('login', 'admin')->first();
            if (!empty($user) && password_verify($request->input('password'), $user->password)) {
                $_SESSION['pex'] = $user->pex;
                $_SESSION['userId'] = $user->id;
                return Helper::redirect(Helper::url());
            }
        }
        return Helper::view('login');
    }

    public function logout()
    {
        $_SESSION['pex'] = 'guest';
        $_SESSION['userId'] = null;
        return Helper::redirect(Helper::url());
    }
}