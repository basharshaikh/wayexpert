import { createApp } from 'vue'
import store from './store'
import router from './routes'
import App from './App.vue'
import './style.css'

createApp(App)
.use(store)
.use(router)
.mount('#app')
