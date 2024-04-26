<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Form;
use function PHPUnit\Framework\isEmpty;

class AuthForm extends Form
{
  public ?User $user;

  public $first_name;

  public $last_name;

  public $email;

  public $password = '';

  public $password_confirmation = '';

  public $remember = false;

  public $agree_to_terms = false;

  public function setUser(User $user)
  {
    $this->user = $user;

    $this->first_name = $user->first_name;

    $this->last_name = $user->last_name;

    $this->email = $user->email;

    $this->password = $user->password;
  }

  public function store(callable $terms)
  {

    $this->validate();

    if ($this->agree_to_terms === false) {

      $terms();

    };

    $this->password = Hash::make($this->password);

    $user = User::create($this->except(['remember', 'agree_to_terms']));

    Auth::login($user);

    $this->reset();

  }

  public function update()
  {
    $this->user->update(

      $this->all()->except('remember')

    );
  }

  public function authorise()
  {
    $this->validate();

    if (Auth::attempt(

      ["email" => $this->email, "password" => $this->password],

      $this->remember)) {

      session()->regenerate();

      return redirect()->intended('/');

    }

    $this->password = null;

    $this->addError('email', 'The provided credentials do not match our records.');

    return back();

  }

  public function rules()
  {
    return [
      'email' => [
        'required',
        'email:rfc',
        Rule::unique('users')->ignore($this->user),
      ],

      'first_name' => 'required',

      'last_name' => 'required|min:5',

      'password' => [
        Rule::requiredIf(fn() => isEmpty($this->user?->id)),
        'confirmed',
        Password::min(8)
          ->mixedCase()
          ->numbers()
          ->symbols()
          ->uncompromised()
      ]
    ];
  }

  public function messages()
  {
    return [
      'first_name.required' => 'Enter :attribute.',
      'last_name.required' => 'Enter :attribute.',
      'email.required' => 'Enter :attribute.',
      'email.rfc' => 'There seems to be an issue validating your :attribute.',
      'email.email' => 'Enter a valid :attribute address.',
      'password.numbers' => 'Include at least one number',
      'password.uncompromised' => 'Your password has appeared in a data leak. Enter a different one',
      'password.symbols' => 'Include at least one symbol',
      'password.mixed' => 'Include at least one uppercase & one lowercase letter',
    ];
  }

  public function boot()
  {
    $this->user = $this->user ?? new User();
  }


}
