<?php

namespace App\Livewire\Contacts;

use Livewire\Component;

class Form extends Component
{
  public $current = 'create';

  public function render()
  {
    return view('livewire.contacts.form');
  }
}
