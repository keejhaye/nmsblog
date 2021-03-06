<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use App\SocialProvider;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_role' => 'author'
        ]);
    }



    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();

        }catch(Exception $e) {
            return redirect('/');
        }

        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if (!$socialProvider) {
            $user = User::firstOrCreate([
                    'email' => $socialUser->getEmail(),
                    'name' => $socialUser->getName(),
                    'user_role' => 'author'
                ]);

            $user->socialProviders()->create(
                    ['provider_id' => $socialUser->getId(), 'provider' => 'google'] 
                );

            $sProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
            $user = $sProvider->user;
            $loginIfEnabled = json_decode($user);
            auth()->login($user);
            return redirect('/home');

        }else {

            $user = $socialProvider->user;
            $loginIfEnabled = json_decode($user);
            if ($loginIfEnabled->is_enabled == 0) {
                return "User is currently disabled.";
            }else {
                auth()->login($user);
                return redirect('/home');
            }

        }
    }




}
