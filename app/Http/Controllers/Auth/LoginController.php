<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use Illuminate\Validation\ValidationException;
use App\Repositories\JsonResponse;
use App\Repositories\User;
use JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = \App\User::where('email', $request->email)->first();
        if (empty($user)) {
            throw new \Exception("Email doesn't exists");
        }

        // Try login
        $isValid = \Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
        // dd($isValid);
        // If isn't valid then your password is incorrect
        if (!$isValid) {
            throw new \Exception('Your password is incorrect');
        }

        $datetimeNow = new \DateTime;

        if (!$token = JWTAuth::attempt($credentials)) {
            throw new \Exception('The credentials is incorect');
        }
        
        $user->web_token = $token;
        $user->save();
        session(['webtoken' => $token]);

        setcookie('webtoken', $token, 0, null, '.widatra.com',false, true);
        if ($token) {
            // dd(Auth::check());
            $jsonResponse = new JsonResponse();
            try {
                User::loginWeb($request);
                // return Redirect::route('back-home');
                $jsonResponse->setSuccess(true);
                $jsonResponse->setMessage('Login Berhasil.');
                $jsonResponse->setNextUrl(route('portal'));
                $request->session()->flash('alert-class', 'alert-success');
                $request->session()->flash('message', 'Anda berhasil login.');
                return redirect()->route('portal');
            } catch(\Exception $e) {
                $errors = $e->getMessage();
                $jsonResponse->setMessage($errors);
                // $jsonResponse->setErrors($errors);
                return response()->json($jsonResponse->getResponse(), 400);
            } 
        }else{
            return redirect()->back()->withInput()->withErrors("Invalid Credential");
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        setcookie('webtoken', '', 0, null, '.widatra.com',false, true);


        return redirect('/');
    }
    public function reset_custom(Request $request){ 
        try {
            $data = \App\User::where('email', $request->email)->first();
            $data->password = $request->password;
            $data->save();   
            $request->session()->flash('alert-class', 'alert-success');
            $request->session()->flash('message', 'Reset Password Berhasil.');
             return redirect('/');
        } catch(\Exception $e) {
            $errors = $e->getMessage();
            $jsonResponse->setMessage($errors);
            // $jsonResponse->setErrors($errors);
            return response()->json($jsonResponse->getResponse(), 400);
        }
    }
}