<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">AI Assistant Suggestions</h2>
    <input v-model="context" placeholder="Context e.g. 'api/performance'" class="border p-2 w-full"/>
    <button @click="getSuggestions" class="bg-indigo-500 text-white px-4 py-2 mt-2">Suggest</button>
    <ul class="mt-4 list-disc pl-6">
      <li v-for="s in suggestions" :key="s">{{ s }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return {
      context: '',
      suggestions: []
    };
  },
  methods: {
    getSuggestions() {
      fetch('/api/ai/suggest?context=' + this.context)
        .then(res => res.json())
        .then(data => this.suggestions = data || []);
    }
  }
}
</script>