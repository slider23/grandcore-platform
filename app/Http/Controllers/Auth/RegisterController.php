<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Model\Invite;
use App\Providers\RouteServiceProvider;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Create a new user instance after a valid registration.
     *
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    protected function store(RegistrationRequest $request)
    {
        try {
            $invite = Invite::where('invite_symbols', $request->invite_symbols)->firstOrFail();
            if (User::where('invite_id', $invite->id)->count() >= (int)$invite->max_count_register) {
                throw new \Exception("Max count of registrations for this invite code");
            }
        } catch (\Exception $exception) {
            return response()->json([
                'data' => [
                    'message' => 'Incorrect invite code'
                ]
            ], 400);
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->   input('email'),
            'password' => Hash::make($request->input('password')),
            'invite_id' => $invite->id
        ]);

        return response()->json([
            'data' => [
                'user' => $user
            ],
            'status' => 'success'
        ], 200);
    }
}
