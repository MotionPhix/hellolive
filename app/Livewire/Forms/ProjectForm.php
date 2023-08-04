<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProjectForm extends Form
{
  public ?Project $project;

  #[Rule('required|min:5')]
  public $name = '';

  #[Rule('required')]
  public $contact_id = '';

  #[Rule('required|min:5')]
  public $description = '';

  public function setProject(Project $project)
  {
    $this->project = $project;

    $this->name = $project->name;

    $this->description = $project->description;
  }

  public function store()
  {
    dd($this->all());

    Project::create($this->only(['name', 'description', 'company_id']));
    $this->reset();
  }

  public function update()
  {
    $this->project->update(
      $this->all()
    );
  }
}
