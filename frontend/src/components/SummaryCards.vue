<script setup>
defineProps({ summary: { type: Object, required: true } });
</script>

<template>
  <div class="grid gap-4 md:grid-cols-3">
    <div class="rounded-xl bg-white p-4 shadow dark:bg-slate-800">
      <p class="text-xs text-slate-500">Total Habits</p>
      <p class="text-2xl font-semibold">{{ summary.total_habits }}</p>
    </div>
    <div class="rounded-xl bg-white p-4 shadow dark:bg-slate-800">
      <p class="text-xs text-slate-500">Completed Today</p>
      <p class="text-2xl font-semibold">{{ summary.completed_today }}</p>
    </div>
    <div class="rounded-xl bg-white p-4 shadow dark:bg-slate-800">
      <p class="text-xs text-slate-500">Longest Streak</p>
      <p class="text-2xl font-semibold">{{ summary.longest_streak }}</p>
    </div>
  </div>
</template>
