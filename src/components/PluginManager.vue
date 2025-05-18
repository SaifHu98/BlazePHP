<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">Plugin Manager</h2>
    <input v-model="pluginName" placeholder="Plugin Name" class="border p-2 mr-2"/>
    <input v-model="pluginCode" placeholder="Function Code (JS style, ex: () => 'Hi')" class="border p-2 w-full my-2"/>
    <button @click="registerPlugin" class="bg-blue-500 text-white px-4 py-2">Register Plugin</button>
    <ul class="mt-4 list-disc pl-6">
      <li v-for="p in plugins" :key="p">{{ p }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return {
      pluginName: '',
      pluginCode: '',
      plugins: []
    };
  },
  methods: {
    registerPlugin() {
      if (this.pluginName) {
        this.plugins.push(this.pluginName);
        this.pluginName = '';
        this.pluginCode = '';
        alert('Plugin registered (simulated)');
      }
    }
  }
}
</script>