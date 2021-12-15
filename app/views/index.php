<?php

if(!estaLogueado()){
  redirigir('/usuarios/login');
}

console($data);

include_once(APPROOT . '/views/includes/header.inc.php');
?>

<div class="flex-none flex flex-nowrap gap-2" style="max-width: 685px">
  <a href="#" class="flex-none h-8 px-3 rounded bg-gray-200 flex items-center justify-center">
    <span class="font-medium">Productos</span>
  </a>
  <a href="#" class="flex-none h-8 px-3 flex items-center justify-center">
    <span class="font-medium">Inventarios</span>
  </a>
  <div class="flex-grow h-8 flex justify-end">
    <a href="#" title="Ayuda" class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <circle cx="12" cy="12" r="9"></circle>
        <line x1="12" y1="17" x2="12" y2="17.01"></line>
        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
      </svg>
    </a>
  </div>
</div>
<div class="flex-none mb-10 flex gap-20 justify-center">
    <canvas id="myChart1" width="400" height="400"></canvas>
    <canvas id="myChart2" width="400" height="400"></canvas>
</div>
<div class="flex-none mb-10 flex gap-3">
  <div class="w-full h-96 bg-red-300"></div>
</div>

<script src="<?= URLROOT; ?>/js/chart.min.js"></script>
<script>
const ctx1 = document.getElementById('myChart1').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>