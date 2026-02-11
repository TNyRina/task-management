<?php

use Livewire\Component;

new class extends Component
{
    public int $completed;
    public int $incomplete;

    public function mount()
    {
        $this->completed = auth()->user()
            ->tasks()->completed()->count();

        $this->incomplete = auth()->user()
            ->tasks()->late()->count();
    }

    public function render()
    {
        return view('livewire.task-donut');
    }
};
?>
