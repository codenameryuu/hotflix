<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

use App\Validations\Auth\AuthValidation;

use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    /**
     ** Validation instance.
     *
     * @var AuthValidation
     */
    protected $authValidation;

    /**
     ** Service instance.
     *
     * @var AuthService
     */
    protected $authService;

    /**
     ** Constructor.
     *
     * @param AuthValidation $authValidation
     * @param AuthService $authService
     */
    public function __construct(AuthValidation $authValidation, AuthService $authService)
    {
        $this->authValidation = $authValidation;
        $this->authService = $authService;
    }

    /**
     ** Index.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     ** Authenticate.
     *
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $validation = $this->authValidation->authenticate($request);

        if (!$validation->status) {
            return redirect()->back()->with($validation->statusNotify, $validation->message);
        }

        $result = $this->authService->authenticate($request);

        if ($result->status) {
            $request->session()->regenerate();
            return redirect()->intended('/film')->with($result->statusNotify, $result->message);
        }

        return redirect()->back()->with($result->statusAlert, $result->message);
    }

    /**
     ** Logout.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return redirect('/');
    }
}
