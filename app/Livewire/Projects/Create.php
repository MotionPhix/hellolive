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
    $this->form->store();

    return $this->redirect('/projects', true);
  }

  public function render()
  {
    return view('livewire.projects.create', [
      'contacts' => Contact::get(['id', 'first_name', 'last_name'])
    ]);
  }
}
