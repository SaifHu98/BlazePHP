<template>
  <div>
    <h2>لوحة المستخدم</h2>
    <p>مرحباً {{ user.name }}</p>
    <button @click="logout">تسجيل الخروج</button>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()
const user = ref({})

const fetchUser = async () => {
  try {
    const token = localStorage.getItem('token')
    const response = await axios.get('/api/user', {
      headers: { Authorization: `Bearer ${token}` }
    })
    user.value = response.data
  } catch {
    router.push('/login')
  }
}

const logout = () => {
  localStorage.removeItem('token')
  router.push('/login')
}

onMounted(fetchUser)
</script>
