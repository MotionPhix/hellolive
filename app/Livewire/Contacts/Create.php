<?php

namespace App\Livewire\Contacts;

use App\Livewire\Forms\ContactForm;
use App\Models\Company;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
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
      'form.email' => 'nullable|email:rfc,dns|unique:contacts,email',
      'form.company_id' => 'required|exists:companies,id',
      'form.status' => 'required|in:active,dormant',
    ], [
      'form.email.unique' => 'That email is already in use by another contact',
      'form.company_id.exists' => 'The selected company isn\'t in the database.'
    ]);

    $this->form->store();

    return $this->redirect(Index::class, true);
  }

  #[On('update-selected-company')]
  public function updateCompany($id)
  {
    // $this->dispatch('update-id', id: $id);

    $this->js(<<<JS
      setTimeout(() => {
        \$wire.form.company_id = $id
      }, 10);
    JS);
  }

  public function render()
  {
    return view('livewire.contacts.create');
  }
}
