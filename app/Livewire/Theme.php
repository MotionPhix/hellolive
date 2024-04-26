<?php

namespace App\Livewire;

use Livewire\Component;

class Theme extends Component
{
  protected $listeners =['ModeView'];
    public $mode;

  public function ModeView($Color){
   $this->mode = $Color;
  }

   public function SwitchMode($SwitcMode){
// you need to add the switch somewhere in your code to be able to toggle the mode
      $this->mode = $SwitcMode;
      $newMode = $SwitcMode =='dark'?'light':'dark';
       $this->dispatch('view-mode', ['newMode' => $newMode]);

   }

    public function render()
    {
        return view('livewire.theme');
    }
}
