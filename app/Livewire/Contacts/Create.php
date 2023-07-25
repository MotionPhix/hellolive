<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use Livewire\Component;

class Create extends Component
{
  public ContactForm $form;

  public function save()
  {
    Contact::create(
      $this->form->all()
    );

    return $this->redirect('/contacts');
  }

  public function render()
  {
    return view('livewire.contacts.create');
  }
}
