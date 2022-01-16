<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

class Login extends Model
{
    use HasFactory;

    private static $tokenExpiration = 10;

    static function login($request)
    {
        Log::channel('login')->info(json_encode($request));
        $user = DB::table('users')
            ->where('email', $request->username)
            ->where('password', md5($request->password))
            ->first();
        if (!$user) {
            return response('Les informations saisis sont incorrectes.', 401);
        }
        return self::_insert($user);
    }

    static function generateToken($user)
    {
        return sha1(date('Y-m-d H:i:s') . $user->email  . $user->password);
    }

    static function _insert($user)
    {
        $loginDate = date('Y-m-d H:i:s');
        $expiration = strtotime($loginDate . ' + ' . self::$tokenExpiration . ' minute');
        $login = [
            'user_id' => $user->id,
            'user_role' => $user->role,
            'login_date' => $loginDate,
            'token' => self::generateToken($user),
            'expiration' => date('Y-m-d H:i:s', $expiration)
        ];
        self::insert($login);
        return [
            'user' => $user,
            'login' => $login
        ];
    }

    static function tokenIsValid($token)
    {
        DB::enableQueryLog();
        $dateNow = date('Y-m-d H:i:s');
        $login = DB::table('logins')
            ->where('token', $token)
            ->where('expiration', '>', $dateNow)
            ->first();
        $query = DB::getQueryLog();
        Log::channel('api')->info(json_encode($query));
        return $login != null;
    }
}
