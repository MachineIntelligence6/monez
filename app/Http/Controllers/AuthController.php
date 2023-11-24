<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected $providers = ['google'];    
    //
            /**
            * Login api
            *
            * @return \Illuminate\Http\Response
            */
            public function login(Request $request)
            {
                $credentials = $request->only('email', 'password');
        
                if (Auth::attempt($credentials)) {
                    $user = Auth::user();
                    $token = $user->generateApiToken();
        
                    return response()->json(['api_token' => $token]);
                }
        
                return response()->json(['message' => 'Invalid credentials'], 401);
            }   
            

            public function authRedirect($driver) {
                if (!$this->isProviderAllowed($driver)) {
                    return $this->failedResponse('Provider is not allowed.');
                }
                try {
                    return Socialite::driver($driver)->redirect();
                } catch (Exception $e) {
                    return $this->failedResponse($e->getMessage());
                }
            }
        
            /**
             * Handle response of authentication redirect
             *
             * @param $driver
             * @return redirect
             */
            public function authCallback($driver) {
                try {
                    // Get user Information from provider
                    $providerUser = Socialite::driver($driver)->user();
                    // Get user information from database
                    $user = User::where('email', $providerUser->getEmail())->first();
                    if($user){
                        // Update user information in database if user is exists
                        $user->update([
                            'name' => $providerUser->getName(),
                            'provider_id' => $providerUser->getId(),
                            'provider' => $driver,
                        ]);
                    }
                    else{
                        // Create new one
                        $user = User::create([
                            'name' => $providerUser->getName(),
                            'email' => $providerUser->getEmail(),
                            'provider' => $driver,
                            'provider_id' => $providerUser->getId(),
                            'password' => 'password'
                        ]);
                    }
                    Auth::login($user);
                    return redirect('/');
                } catch (Exception $e) {
                    return $this->failedResponse($e->getMessage());
                }
            }
        
            /**
             * Check for provider allowed and services configured
             *
             * @param $driver
             * @return bool
             */
            private function isProviderAllowed($driver)
            {
                return in_array($driver, $this->providers) && config()->has("services.{$driver}");
            }
        
            /**
             * Send a failed response with a message
             *
             * @param $message
             * @return \Illuminate\Http\RedirectResponse
             */
            protected function failedResponse($message) {
                return redirect('/')->with(['message'=>$message]);
            }            
}
