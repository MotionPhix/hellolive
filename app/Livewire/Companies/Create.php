<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Create extends Component
{
  public $name;

  public function save()
  {
    $this->validate([
      'name' => 'required|string',
    ]);

    $company = new Company();

    $company->name = $this->name;

    $company->save();

    return $this->redirect('/contacts');
  }

  public function render()
  {
    return view('livewire.companies.create');
  }
}
