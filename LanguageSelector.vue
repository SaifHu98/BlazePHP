<template>
  <div class="p-2 text-right">
    <select v-model="lang" @change="setLanguage" class="border p-2 rounded">
      <option value="en">English</option>
      <option value="ar">العربية</option>
      <option value="fr">Français</option>
    </select>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lang: localStorage.getItem('lang') || 'en'
    }
  },
  methods: {
    setLanguage() {
      localStorage.setItem('lang', this.lang)
      window.location.reload()
    }
  },
  mounted() {
    document.documentElement.setAttribute("lang", this.lang)
  }
}
</script>
