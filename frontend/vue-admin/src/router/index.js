import { createRouter, createWebHistory } from 'vue-router'
import Login from './components/Login.vue'
import Dashboard from './components/UserDashboard.vue'
import App from './App.vue'

const routes = [
  { path: '/', component: App },
  { path: '/login', component: Login },
  { path: '/dashboard', component: Dashboard }
]

export default createRouter({
  history: createWebHistory(),
  routes
})
