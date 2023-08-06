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
  public function open(Contact $id)
  {
    $this->dispatch('open-modal', modal: 'base-contact');
    $this->form->setContact($id);
  }

  #[Layout('components.layouts.app')]
  public function render()
  {
    return view('livewire.contacts.create');
  }
}
