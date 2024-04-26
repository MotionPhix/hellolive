<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\AuthForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{

  public AuthForm $form;

  public function submit()
  {

    $this->form->authorise();

    return redirect()->to('/');

  }

  #[Title('Login')]
  #[Layout('components.layouts.guest')]
  public function render()
  {
    return view('livewire.auth.login');
  }
}
