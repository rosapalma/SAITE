
    <!-- Elemento canvas para el gráfico -->
    <div style="width: 300px; margin: auto;">
        <canvas id="graficoEstatus"></canvas>
    </div>



       


<!-- Cargar Chart.js desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoEstatus').getContext('2d');
    
    const graficoEstatus = new Chart(ctx, {
        type: 'doughnut', // Usa 'pie' si prefieres un círculo completo sin hueco central
        data: {
            labels: @json($labels), // Recibe los estatus desde Laravel
            datasets: [{
                label: 'Cantidad de Solicitudes',
                data: @json($data), // Recibe los totales desde Laravel
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',  // Color para el estatus 1
                    'rgba(54, 162, 235, 0.7)',  // Color para el estatus 2
                    'rgba(255, 206, 86, 0.7)',  // Color para el estatus 3
                    'rgba(75, 192, 192, 0.7)'   // Color para el estatus 4
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Distribución de Solicitudes por Estatus'
                }
            }
        }
    });
</script>
	