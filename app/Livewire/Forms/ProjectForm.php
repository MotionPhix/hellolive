<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Form;

class ProjectForm extends Form
{
  public ?Project $project;

  public $name;
  public $contact_id;
  public $description;

  public function setProject(Project $project)
  {
    $this->project = $project;

    $this->name = $project->name;

    $this->description = $project->description;
  }

  public function store()
  {
    $project = new Project();

    $project->name = $this->name;
    $project->description = $this->description;
    $project->contact_id = is_array($this->contact_id) ? $this->contact_id['id'] : $this->contact_id;

    $project->save();

    $this->reset();
  }

  public function update()
  {
    $this->project->update(
      $this->all()
    );
  }
}
