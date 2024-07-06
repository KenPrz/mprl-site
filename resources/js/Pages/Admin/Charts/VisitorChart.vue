<template>
    <canvas id="visitorChart"></canvas>
  </template>
  
  <script setup>
  import { onMounted, computed } from 'vue';
  import { Chart } from 'chart.js/auto';
  
  const props = defineProps({
    visitorData: {
      type: Array,
      default: () => [],
    },
  });
  
  const aggregatedData = computed(() => {
    const dataMap = new Map();
    
    // Aggregate data by date whatever the date format is honestly lol idjkjk;oa s;jlkdfl;jk
    props.visitorData.forEach(data => {
      const date = new Date(data.created_at).toLocaleDateString();
      dataMap.set(date, (dataMap.get(date) || 0) + 1);
    });
    
    // Get the month and year of the first data point
    const firstDate = new Date(props.visitorData[0]?.created_at);
    const year = firstDate.getFullYear();
    const month = firstDate.getMonth();
    
    // Create an array for all days in the month
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const allDays = Array.from({ length: daysInMonth }, (_, i) => {
      const day = new Date(year, month, i + 1).toLocaleDateString();
      return { date: day, count: dataMap.get(day) || 0 };
    });
    return allDays;
  });
  
  onMounted(() => {
    const ctx = document.getElementById('visitorChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: aggregatedData.value.map(data => data.date),
        datasets: [{
          label: 'Visitors',
          data: aggregatedData.value.map(data => data.count),
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Number of Visitors'
            }
          },
          x: {
            title: {
              display: true,
              text: 'Date'
            }
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'Daily Visitors'
          }
        }
      }
    });
  });
  </script>

<!-- God i hate statistics JKOPASDJI"KA"JPI:KSD -->