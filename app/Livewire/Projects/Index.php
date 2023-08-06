<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
  #[Layout('components.layouts.app')]
  public function render()
  {
    return view('livewire.projects.index', [
      'projects' => Project::forUser(auth()->user())->get()
    ]);
  }
}
