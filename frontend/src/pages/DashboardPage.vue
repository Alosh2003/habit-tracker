<script setup>
import DashboardLayout from '../layouts/DashboardLayout.vue';
import SummaryCards from '../components/SummaryCards.vue';
import ProgressChart from '../components/ProgressChart.vue';

const summary = { total_habits: 6, completed_today: 4, longest_streak: 12 };
const chartData = {
  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
  datasets: [{ label: 'Completion %', data: [72, 83, 67, 91, 77, 88, 80], backgroundColor: '#3b82f6' }]
};
</script>

<template>
  <DashboardLayout>
    <div class="space-y-6">
      <SummaryCards :summary="summary" />
      <ProgressChart :data="chartData" />
    </div>
  </DashboardLayout>
</template>
