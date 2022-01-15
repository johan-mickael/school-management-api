<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Login extends Model
{
    use HasFactory;

    static function login($request)
    {
        $user = DB::table('users')
            ->where('email', $request->username)
            ->where('password', md5($request->password))
            ->first();
        if (!$user) {
            throw new Exception("Informations non valides.");
        }
        self::_insert($user);
        return $user;
    }

    static function generateToken($user)
    {
        return sha1(date('Y-m-d H:i:s') . $user->email  . $user->password);
    }

    static function _insert($user)
    {
        $tokenDuration = 5;
        if ($user->id == 1) {
            $tokenDuration = 15;
        }
        $loginDate = date('Y-m-d H:i:s');
        $expiration = strtotime($loginDate . ' + ' . $tokenDuration . ' minute');
        $login = [
            'user_id' => $user->id,
            'login_date' => $loginDate,
            'token' => self::generateToken($user),
            'expiration' => date('Y-m-d H:i:s', $expiration)
        ];
        self::insert($login);
    }

    static function isConnected($user)
    {
        $dateNow = date('Y-m-d H:i:s');
        $login = DB::table('users')
            ->where('user_id', $user->id)
            ->where('expiration', '<', $dateNow)
            ->first();

    }
}
