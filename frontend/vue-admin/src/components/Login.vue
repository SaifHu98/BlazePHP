<template>
  <div class="login-container">
    <h2>تسجيل الدخول</h2>
    <form @submit.prevent="handleLogin">
      <input v-model="email" type="email" placeholder="البريد الإلكتروني" required />
      <input v-model="password" type="password" placeholder="كلمة المرور" required />
      <button type="submit">دخول</button>
    </form>
    <p v-if="error" style="color:red">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()
const email = ref('')
const password = ref('')
const error = ref('')

const handleLogin = async () => {
  try {
    const response = await axios.post('/api/login', {
      email: email.value,
      password: password.value
    })
    localStorage.setItem('token', response.data.token)
    router.push('/dashboard')
  } catch (err) {
    error.value = 'بيانات الدخول غير صحيحة'
  }
}
</script>
