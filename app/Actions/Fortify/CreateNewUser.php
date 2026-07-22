<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ],[
            "name.required"=> "Il nome è obbligatorio",
            "name.string"=> "Il nome può essere composto solo da lettere",
            "name.max"=> "Il nome ha troppi caratteri",
            'email.required'=>" La mail è obbligatoria",
            'email.string'=>" La mail deve contere solo caratteri validi",
            'email.email'=>" La mail deve avere @",
            'email.max'=>" La mail ha troppi caratteri",
            "password.required"=>"La password è obbligatoria",
            "password.string"=>"La password deve contenere solo caratteri validi",
            "password.confirmed"=>"La password non combacia",
            
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
