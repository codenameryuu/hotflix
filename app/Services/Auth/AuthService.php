<?php

namespace App\Services\Auth;

use App\Helpers\MessageHelper;

class AuthService
{
    /**
     ** Authenticate service.
     *
     * @param $request
     * @return object
     */
    public function authenticate($request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        auth()->attempt($data);

        $user = auth()->user();

        $status = true;
        $statusNotify = 'info';
        $message = 'Selamat Datang, ' . $user->username . ' !';

        $result = (object) [
            'status' => $status,
            'statusNotify' => $statusNotify,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Logout service.
     *
     * @param $request
     * @return object
     */
    public function logout($request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $status = true;
        $message = MessageHelper::logoutSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
