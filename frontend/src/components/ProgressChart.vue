<script setup>
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

defineProps({ data: { type: Object, required: true } });
</script>

<template>
  <div class="rounded-xl bg-white p-4 shadow dark:bg-slate-800">
    <h3 class="mb-3 text-sm font-semibold">Weekly Progress</h3>
    <Bar :data="data" :options="{ responsive: true, maintainAspectRatio: false }" class="h-64" />
  </div>
</template>
