<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class IndexProjects extends Component
{
  public $count = 0;

  public function Counter() {
    $this->count++;
  }

  public function render()
  {
    return view('livewire.projects.index-projects');
  }
}
