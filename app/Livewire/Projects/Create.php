<?php

namespace App\Livewire\Projects;

use App\Livewire\Forms\ProjectForm;
use App\Models\Contact;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
  public ProjectForm $form;

  public function submit()
  {
    $this->validate([
      'form.name' => 'required|regex:/(^[\pL0-9 ]+)$/u',
      'form.contact_id' => 'required',
      'form.contact_id["id"]' => 'exists:contacts,id',
      'form.description' => 'nullable|min:30'
    ], [
      'form.name.required' => 'Fill out project name',
      'form.name.regex' => 'Name should contain text and/ numbers only',
      'form.contact_id.required' => 'Pick a contact person',
      'form.contact_id.exists' => 'The selected contact couldn\'t be verified',
      'form.description.min' => 'Description should be 30 characters+, not less',
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
