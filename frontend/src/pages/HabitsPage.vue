<script setup>
import DashboardLayout from '../layouts/DashboardLayout.vue';
import HabitGrid from '../components/HabitGrid.vue';

const days = Array.from({ length: 14 }).map((_, idx) => {
  const date = new Date();
  date.setDate(date.getDate() - (13 - idx));
  return date.toISOString().slice(0, 10);
});

const habits = [
  { id: 1, title: 'Read 20 minutes', logs: [{ date: days[0], status: 'completed' }, { date: days[1], status: 'missed' }] },
  { id: 2, title: 'Exercise', logs: [{ date: days[1], status: 'completed' }, { date: days[2], status: 'completed' }] },
  { id: 3, title: 'Meditate', logs: [{ date: days[4], status: 'missed' }, { date: days[5], status: 'completed' }] }
];
</script>

<template>
  <DashboardLayout>
    <div class="space-y-3">
      <h2 class="text-lg font-semibold">Habit Tracker Grid</h2>
      <HabitGrid :habits="habits" :days="days" />
    </div>
  </DashboardLayout>
</template>
