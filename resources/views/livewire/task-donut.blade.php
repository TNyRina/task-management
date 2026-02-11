<div class="w-64 mx-auto">
    <canvas id="taskDonut"></canvas>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        const ctx = document.getElementById('taskDonut').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Réalisées', 'En retard'],
                datasets: [{
                    data: [
                        @json($completed),
                        @json($incomplete)
                    ],
                    backgroundColor: [
                        '#16a34a', // green-500
                        '#dc2626'  // red-500
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>
