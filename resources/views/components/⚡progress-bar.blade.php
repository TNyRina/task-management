<?php

use Livewire\Component;

new class extends Component
{   
    public float $progress   = 0;

    public function mount($user){
        $this->progress = $this->progress($user);
    }

    private function progress($user){
        $total = $user->tasks()->daily()->count();
        $completed = $user->tasks()->completed()->count();

        return number_format($completed*100 / $total, 1);
    }

    public function render()
    {
        return view('livewire.progress-bar');
    }
};
?>
