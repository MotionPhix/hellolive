<?php

namespace App\Livewire\Forms;

use App\Models\Contact;
use Livewire\Form;

class ContactForm extends Form
{
  public ?Contact $contact;

  public $company_id;
  public $first_name;
  public $last_name;
  public $status;
  public $phone;
  public $email;

  public function store()
  {
    $contact = new Contact();

    $contact->first_name = $this->first_name;
    $contact->last_name = $this->last_name;
    $contact->email = $this->email;
    $contact->status = $this->status;
    $contact->company_id = $this->company_id;
    $contact->user_id = auth()->user()->id;

    $contact->save();

    if ($this->phone) {
      $phone = new \App\Models\Phone();

      $phone->number = $this->phone;

      $contact->phones()->save($phone);
    }

    $this->reset();
  }

  public function setContact(Contact $contact)
  {
    $this->contact = $contact;

    $this->first_name = $contact->first_name;

    $this->last_name = $contact->last_name;

    $this->email = $contact->email;

    $this->status = $contact->status;

    if ($contact->phones()->count()) {
      $this->phone = $contact->phones->random()->number;
    }

    $this->company_id = $contact->company_id;
  }

  public function update()
  {
    $this->contact->first_name = $this->first_name;
    $this->contact->last_name = $this->last_name;
    $this->contact->email = $this->email;
    $this->contact->status = $this->status;
    $this->contact->company_id = $this->company_id;

    $this->contact->user_id = auth()->user()->id;

    $this->contact->save();

    if ($this->phone) {
      $phone = new \App\Models\Phone();

      $phone->number = $this->phone;

      $this->contact->phones()->save($phone);
    }
  }
}
