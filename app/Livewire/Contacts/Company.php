<?php

namespace App\Livewire\Contacts;

use App\Models\Company as ModelsCompany;
use Livewire\Component;

class Company extends Component
{
  public $open = false;
  public $name;

  public function addCompany()
  {
    $this->validate([
      'name' => 'required|string',
    ]);

    $company = new ModelsCompany();

    $company->name = $this->name;

    $company->save();

    $this->reset('name');

    $this->open = false;

    $this->dispatch('close', modal: 'create-company');
    $this->dispatch('update-selected-company', company: $company->id)->to(Create::class);
  }

  public function render()
  {
    return view('livewire.contacts.company');
  }
}
