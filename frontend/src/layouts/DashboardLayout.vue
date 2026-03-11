<template>
  <div class="min-h-screen">
    <header class="border-b border-slate-200 bg-white px-6 py-4 dark:border-slate-800 dark:bg-slate-950">
      <div class="mx-auto flex max-w-7xl items-center justify-between">
        <h1 class="text-xl font-bold">Habit Tracker</h1>
        <nav class="flex gap-4 text-sm">
          <RouterLink to="/dashboard">Dashboard</RouterLink>
          <RouterLink to="/habits">Habits</RouterLink>
        </nav>
      </div>
    </header>
    <main class="mx-auto max-w-7xl p-6">
      <slot />
    </main>
  </div>
</template>
