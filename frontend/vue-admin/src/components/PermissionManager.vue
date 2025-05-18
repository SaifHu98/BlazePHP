<template>
  <div class="permissions">
    <h2>إدارة الصلاحيات</h2>
    <ul>
      <li v-for="perm in permissions" :key="perm.id">
        {{ perm.name }}
        <button @click="editPermission(perm.id)">تعديل</button>
        <button @click="deletePermission(perm.id)">حذف</button>
      </li>
    </ul>

    <form @submit.prevent="createPermission">
      <input v-model="newPermission" placeholder="اسم الصلاحية" required />
      <button type="submit">إضافة</button>
    </form>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const permissions = ref([])
const newPermission = ref('')

const fetchPermissions = async () => {
  const res = await axios.get('/api/admin/permissions')
  permissions.value = res.data
}

const createPermission = async () => {
  await axios.post('/api/admin/permissions/store', { name: newPermission.value })
  newPermission.value = ''
  fetchPermissions()
}

const deletePermission = async (id) => {
  await axios.post(`/api/admin/permissions/${id}/delete`)
  fetchPermissions()
}

const editPermission = (id) => {
  alert('تعديل الصلاحية غير مفعل بعد (للواجهة فقط)')
}

onMounted(fetchPermissions)
</script>

<style scoped>
.permissions {
  max-width: 600px;
  margin: 2rem auto;
  padding: 1rem;
  border: 1px solid #ddd;
  border-radius: 8px;
  background: #f9f9f9;
}
.permissions h2 {
  margin-bottom: 1rem;
}
.permissions form {
  margin-top: 1rem;
}
.permissions input {
  padding: 0.5rem;
  margin-right: 0.5rem;
}
.permissions button {
  padding: 0.5rem 1rem;
  margin-left: 0.25rem;
}
</style>
