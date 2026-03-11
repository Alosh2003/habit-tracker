<script setup>
import { computed } from 'vue';

const props = defineProps({
  habits: { type: Array, required: true },
  days: { type: Array, required: true }
});

const statusClass = computed(() => ({
  completed: 'bg-emerald-500',
  missed: 'bg-rose-500',
  pending: 'bg-slate-300 dark:bg-slate-700'
}));

const resolveStatus = (habit, day) => habit.logs?.find((log) => log.date === day)?.status || 'pending';
</script>

<template>
  <div class="overflow-auto rounded-xl border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
    <div class="grid min-w-[900px]" :style="`grid-template-columns: 220px repeat(${days.length}, minmax(24px, 1fr));`">
      <div class="sticky left-0 bg-white px-2 py-1 text-xs font-semibold dark:bg-slate-800">Habit</div>
      <div v-for="day in days" :key="day" class="px-1 py-1 text-center text-[10px]">{{ day.slice(-2) }}</div>

      <template v-for="habit in habits" :key="habit.id">
        <div class="sticky left-0 border-t border-slate-100 bg-white px-2 py-2 text-sm dark:border-slate-700 dark:bg-slate-800">{{ habit.title }}</div>
        <button
          v-for="day in days"
          :key="`${habit.id}-${day}`"
          class="m-0.5 h-6 rounded"
          :class="statusClass[resolveStatus(habit, day)]"
        />
      </template>
    </div>
  </div>
</template>
