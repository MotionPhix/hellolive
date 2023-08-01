<?php

namespace App\Livewire\Contacts;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
  public $companies;
  public $first_name;
  public $last_name;
  public $status;
  public $email;

  #[Locked]
  public $company_id;

  // #[Computed]
  // public function companies()
  // {
  //   return Company::get(['name', 'id']);
  // }

  public function save()
  {
    $this->validate([
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'email' => 'nullable|email:rfc,dns|unique:contacts',
      'company_id' => 'required|exists:companies,id',
      'status' => 'required|in:active,in_active',
    ], [
      'company_id.exists' => 'The selected company isn\'t in the database.'
    ]);

    $contact = new Contact();

    $contact->first_name = $this->first_name;
    $contact->last_name = $this->last_name;
    $contact->email = $this->email;
    $contact->status = $this->status;
    $contact->company_id = $this->company_id;
    $contact->user_id = Auth::user()->id;

    $contact->save();

    $this->reset();

    return $this->redirect(Index::class);
  }

  public function updated($property)
  {
    if ($property === 'companies') {
      dd('we have a winner!');
    }
  }

  #[On('update-selected-company')]
  public function setCompanyId($id)
  {
    $this->companies = Company::get(['id', 'name']);
    // $this->mount();
    // $this->company_id = $id;
  }

  public function mount()
  {
    $this->companies = Company::get(['id', 'name']);
  }

  public function render()
  {
    return view('livewire.contacts.create');
  }
}
