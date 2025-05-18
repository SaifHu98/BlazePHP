<template>
  <div class="users">
    <h2>User Management</h2>
    <table>
      <thead>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button @click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const users = ref([])

const fetchUsers = async () => {
  const res = await axios.get('/api/users')
  users.value = res.data
}

const deleteUser = async (id) => {
  await axios.post(`/api/users/${id}/delete`)
  fetchUsers()
}

onMounted(fetchUsers)
</script>

<style scoped>
.users {
  max-width: 700px;
  margin: 2rem auto;
}
table {
  width: 100%;
  border-collapse: collapse;
}
td, th {
  padding: 0.5rem;
  border: 1px solid #ddd;
}
button {
  padding: 0.25rem 0.75rem;
  background: crimson;
  color: #fff;
  border: none;
  border-radius: 4px;
}
</style>
