<?php

namespace App\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
  public $search = '';

  #[Url('base', true)]
  public $field = 'first_name';

  #[Url('sort', true)]
  public $direction = 'asc';

  public function placeholder()
  {
    return <<<'HTML'
      <div>
        Loading ...
      </div>
    HTML;
  }

  public function edit($id)
  {
    $this->dispatch('update-contact', contact: $id)->to(Update::class);
  }

  public function sortBy($column)
  {
    /*if ($this->field === $column)
    {

      $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';

    } else {

      $this->direction = 'asc';

    }*/

    $this->direction = $this->field === $column
      ? $this->direction = $this->direction === 'asc' ? 'desc' : 'asc'
      : 'asc';

    $this->field = $column;

  }

  #[Layout('components.layouts.app')]
  public function render()
  {
    return view('livewire.contacts.index', [
      'contacts' => Contact::where('first_name', 'LIKE', "%$this->search%")
        ->orWhere('last_name', 'LIKE', "%$this->search%")
        ->orWhere('email', 'LIKE', "%$this->search%")
        ->orderBy($this->field, $this->direction)
        ->get()
    ]);
  }
}
