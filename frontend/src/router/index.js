import { createRouter, createWebHistory } from 'vue-router';
import DashboardPage from '../pages/DashboardPage.vue';
import HabitsPage from '../pages/HabitsPage.vue';
import LoginPage from '../pages/LoginPage.vue';
import RegisterPage from '../pages/RegisterPage.vue';

const routes = [
  { path: '/', redirect: '/dashboard' },
  { path: '/dashboard', component: DashboardPage },
  { path: '/habits', component: HabitsPage },
  { path: '/login', component: LoginPage },
  { path: '/register', component: RegisterPage }
];

export default createRouter({
  history: createWebHistory(),
  routes
});
