<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ContactForm extends Form
{
  #[Rule('required|min:5')]
  public $title = '';

  #[Rule('required|min:5')]
  public $content = '';
}
