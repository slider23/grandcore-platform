<?php

namespace App\Http\Livewire\Auth;

use App\Http\Requests\RegistrationRequest;
use App\Model\Invite;
use App\Providers\RouteServiceProvider;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    /** @var string */
    public $invite_symbols = '';

    public function register()
    {
        $validator = Validator::make([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'passwordConfirmation' => $this->passwordConfirmation,
            'invite_symbols' => $this->invite_symbols,
        ],[
            'name' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'same:passwordConfirmation'],
            'invite_symbols' => ['required', 'string', 'min:10', 'max:64'],
        ]);
        $validator->after(function ($validator) {
            $invite = Invite::where('invite_symbols', $this->invite_symbols)->first();
            if(!$invite
                OR User::where('invite_id', $invite->id)->count() >= (int)$invite->max_count_register
                OR $invite->is_frozen
            ){
                $validator->errors()->add('invite_symbols', 'Incorrect invite code.');
            }
        });
        $validator->validate();

        $invite = Invite::where('invite_symbols', $this->invite_symbols)->first();
        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'invite_id' => $invite->id
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
