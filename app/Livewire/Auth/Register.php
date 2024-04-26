<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\AuthForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
  public AuthForm $form;

  public function submit()
  {

    $this->form->store();

    return redirect()->to('/');

  }

  #[Title('Register')]
  #[Layout('components.layouts.guest')]
  public function render()
  {
    return view('livewire.auth.register');
  }
}
