<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Company;
use App\Models\Contact;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
  public ContactForm $form;

  #[Computed]
  public function companies()
  {
    return Company::get(['name', 'id']);
  }

  public function save()
  {
    $this->form->update();

    return $this->redirect('/contacts', true);
  }

  #[On('update-contact')]
  public function open(Contact $contact)
  {
    // $this->form->setContact($contact);
    $this->dispatch('open-modal', modal: 'base-contact-edit');
  }

  #[Layout('components.layouts.app')]
  public function render()
  {
    return view('livewire.contacts.create');
  }
}
