<template>
  <div class="settings">
    <h2>System Settings</h2>
    <form @submit.prevent="saveSettings">
      <div v-for="(value, key) in settings" :key="key" class="form-group">
        <label :for="key">{{ key }}</label>
        <input v-model="settings[key]" :id="key" />
      </div>
      <button type="submit">Save</button>
    </form>
    <p v-if="message" class="msg">{{ message }}</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const settings = ref({})
const message = ref('')

const fetchSettings = async () => {
  const res = await axios.get('/api/settings')
  settings.value = res.data
}

const saveSettings = async () => {
  await axios.post('/api/settings', settings.value)
  message.value = 'Settings updated successfully.'
}

onMounted(fetchSettings)
</script>

<style scoped>
.settings {
  max-width: 600px;
  margin: 2rem auto;
}
.form-group {
  margin-bottom: 1rem;
}
input {
  width: 100%;
  padding: 0.5rem;
}
button {
  padding: 0.5rem 1rem;
}
.msg {
  margin-top: 1rem;
  color: green;
}
</style>
