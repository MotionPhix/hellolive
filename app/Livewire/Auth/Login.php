<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
  public $email;
  public $password;
  public bool $remember = false;

  public function submit(Request $request)
  {
    $this->validate([
      'email' => 'required|email:rfc', //|unique:users
      'password' => 'required',
    ]);
  }

  #[Title('Login')]
  #[Layout('components.layouts.guest')]
  public function render()
  {
    return view('livewire.auth.login');
  }
}
