<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Form;

class AuthForm extends Form
{
  public ?User $user;

  public $first_name;

  public $last_name;

  public $email;

  public $password = '';

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

  public function store()
  {

    if (!$this->agree_to_terms) {

      $this->addError('password', 'Please accept our terms of service.');

      return;

    };

    $this->validate();

    $this->password = Hash::make($this->password);

    User::create($this->except(['remember', 'agree_to_terms']));

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
      'first_name' => 'required|min:5',
    ];
  }

}
