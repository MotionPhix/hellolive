<?php

namespace App\Livewire\Projects;

use App\Livewire\Forms\ProjectForm;
use App\Models\Contact;
use Livewire\Component;

class Create extends Component
{
  public ProjectForm $form;

  public function submit()
  {
    $this->validate([
      'form.name' => 'required',
      'form.contact_id' => 'required|exists:contacts,id',
      'form.description' => 'nullable|min:30'
    ], [
      'form.contact_id.required' => 'The selected contact doesn\'t exist'
    ]);

    $this->form->store();

    $this->dispatch('close', modal: 'create-base-project');

    return $this->redirect('/projects', true);
  }

  public function render()
  {
    return view('livewire.projects.create', [
      'contacts' => Contact::get(['id', 'first_name', 'last_name'])
        ->transform(function ($contact) {
          return [
            'id' => $contact->id,
            'option' => $contact->first_name . ' ' . $contact->last_name,
            'disabled' => false
          ];
        })
        ->toArray()
    ]);
  }
}
