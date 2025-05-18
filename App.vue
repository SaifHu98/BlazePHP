<template>
  <div :lang="lang" class="min-h-screen bg-gray-100 text-gray-800">
    <LanguageSelector />
    <router-view />
  </div>
</template>

<script>
import LanguageSelector from './components/LanguageSelector.vue'

export default {
  components: { LanguageSelector },
  data() {
    return {
      lang: localStorage.getItem('lang') || 'en'
    }
  },
  mounted() {
    document.cookie = "lang=" + this.lang + "; path=/";
    document.documentElement.setAttribute('lang', this.lang);
  }
}
</script>
