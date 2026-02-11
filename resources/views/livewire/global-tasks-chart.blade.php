<div class="w-full max-w-lg mx-auto">
    <canvas id="weeklyTasks"></canvas>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        const ctx = document.getElementById('weeklyTasks').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Tâches complétées',
                    data: @json($data['completed']),
                    backgroundColor: '#3b82f6', // blue-500
                    borderRadius: 6
                }, {
                    label: 'Tâches en retard',
                    data: @json($data['late']),
                    backgroundColor: '#ff0000', // blue-500
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    });
</script>
