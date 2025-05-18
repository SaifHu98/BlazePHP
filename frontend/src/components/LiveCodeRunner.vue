<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">Live Code Runner</h2>
    <textarea v-model="code" class="w-full border p-2 h-40"></textarea>
    <button @click="runCode" class="bg-green-500 text-white px-4 py-2 mt-2">Run</button>
    <pre class="bg-gray-200 p-4 mt-2">{{ result }}</pre>
  </div>
</template>
<script>
export default {
  data() {
    return {
      code: '',
      result: ''
    };
  },
  methods: {
    runCode() {
      fetch('/api/livecode/run', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ code: this.code })
      })
      .then(res => res.json())
      .then(data => this.result = data.output || 'No response');
    }
  }
}
</script>