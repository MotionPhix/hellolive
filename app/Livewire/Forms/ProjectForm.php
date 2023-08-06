<?php

namespace App\Livewire\Forms;

use App\Models\Contact;
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
    $contact = Contact::findOrFail($this->contact_id['id']);

    $project->name = $this->name;
    $project->description = $this->description;
    $project->contact_id = $this->contact_id['id'];
    $project->company_id = $contact->company->id;
    $project->user_id = auth()->user()->id;

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
