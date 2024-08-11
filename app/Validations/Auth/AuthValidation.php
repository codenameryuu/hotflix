<?php

namespace App\Validations\Auth;

use Illuminate\Support\Facades\Hash;

use App\Helpers\MessageHelper;

use App\Models\User;

class AuthValidation
{
    /**
     ** Authenticate validation.
     *
     * @param $request
     * @return object
     */
    public function authenticate($request)
    {
        $user = User::where('username', $request->username)
            ->first();

        // * Check username is available
        if (empty($user)) {
            $status = false;
            $statusNotify = 'danger';
            $message = 'Username not found !';

            $result = (object) [
                'status' => $status,
                'statusNotify' => $statusNotify,
                'message' => $message
            ];

            return $result;
        }

        // * Check password is correct
        if (!Hash::check($request->password, $user->password)) {
            $status = false;
            $statusNotify = 'danger';
            $message = 'Incorrect password !';

            $result = (object) [
                'status' => $status,
                'statusNotify' => $statusNotify,
                'message' => $message
            ];

            return $result;
        }

        $status = true;
        $message = MessageHelper::validateSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message
        ];

        return $result;
    }
}
