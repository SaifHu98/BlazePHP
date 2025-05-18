<template>
  <div>
    <h1>BlazePHP Vue Dashboard</h1>
    <PluginManager />
    <LiveCodeRunner />
    <AIAssistant />
    <LanguageSelector />
  </div>
</template>

<script setup>
import PluginManager from './components/PluginManager.vue'
import LiveCodeRunner from './components/LiveCodeRunner.vue'
import AIAssistant from './components/AIAssistant.vue'
import LanguageSelector from './components/LanguageSelector.vue'
</script>
