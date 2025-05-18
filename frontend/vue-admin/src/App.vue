<template>
  <div>
    <h1>BlazePHP Vue Dashboard</h1>
    <PluginManager />
    <LiveCodeRunner />
    <AIAssistant />
    <LanguageSelector />
  </div>
  <PermissionManager />
  <SettingsPage />
  <UserManager />
</template>

<script setup>
import PluginManager from './components/PluginManager.vue'
import LiveCodeRunner from './components/LiveCodeRunner.vue'
import AIAssistant from './components/AIAssistant.vue'
import LanguageSelector from './components/LanguageSelector.vue'
import PermissionManager from './components/PermissionManager.vue'
import SettingsPage from './components/SettingsPage.vue'
import UserManager from './components/UserManager.vue'
</script>
