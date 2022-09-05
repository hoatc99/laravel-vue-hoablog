import { createRoute, createWebHistory } from 'vue-router'
import store from '../store'

const routes = []

const router = createRouter({
  history: createWebHistory(), 
  routes
})

router.router.beforeEach((to, from, next) => {
  // to and from are both route objects. must call `next`.
})

export default router