<?php

use Livewire\Component;

new class extends Component
{   
    public float $progress   = 0;

    public function mount(){
        $this->progress = $this->progress();
    }

    private function progress(){
        $total = auth()->user()->tasks()->daily()->count();
        $completed = auth()->user()->tasks()->dailyCompleted()->count();
        
        if ($total == 0 )
            return 0;

        return number_format($completed*100 / $total, 1);
    }

    public function render()
    {
        return view('livewire.progress-bar');
    }
};
?>
