<?php

use Livewire\Component;

new class extends Component
{
    public array $data = [];

    public function mount()
    {
        $user = auth()->user();

        $labels = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
        $completed = [];
        $lates = [];


        foreach (range(1, 7) as $day) {
            $completed[] = $user->tasks()->completedAtDayOfThisWeek($day-1)->count();
            $late[] = $user->tasks()->incompletedAtDayOfThisWeek($day-1)->count();
        }

        

        $this->data = [
            'labels' => $labels,
            'completed' => $completed,
            'late' => $late
        ];

    }


    public function render()
    {
        return view('livewire.global-tasks-chart');
    }
};
?>
