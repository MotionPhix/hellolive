<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;

class Index extends Component
{
  public $search = '';

  public function render()
  {
    return view('livewire.contacts.index', [
      'contacts' => Contact::search($this->search)
    ]);
  }
}
