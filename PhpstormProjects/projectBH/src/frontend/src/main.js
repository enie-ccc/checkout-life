import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import api from './plugins/axios' // ← ВОТ ТУТ

const app = createApp(App)

app.config.globalProperties.$api = api // ← ВОТ ЭТО

app.use(createPinia())
app.use(router)

app.mount('#app')
