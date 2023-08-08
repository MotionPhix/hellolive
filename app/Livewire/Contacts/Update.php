<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Validation\Rule;
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
    $this->validate([
      'form.first_name' => 'required|string',
      'form.last_name' => 'required|string',
      'form.email' => ['nullable', 'email:rfc,dns', Rule::unique('contacts', 'email')->ignore($this->form->contact->id)],
      'form.company_id' => 'required|exists:companies,id',
      'form.status' => 'required|in:active,dormant',
    ], [
      'form.email.email' => 'The email you provided looks too fake',
      'form.email.unique' => 'That email is already in use by another contact',
      'form.company_id.exists' => 'The selected company isn\'t in the database.'
    ]);

    $this->form->update();

    return $this->redirect('/contacts', true);
  }

  #[On('update-contact')]
  public function open(Contact $contact)
  {
    $this->dispatch('open-modal', 'base-contact-update');
    $this->form->setContact($contact);
  }

  #[Layout('components.layouts.app')]
  public function render()
  {
    return view('livewire.contacts.update', [
      'title' => 'Update contact'
    ]);
  }
}
