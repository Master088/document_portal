import { createApp } from 'vue'
import store from './store'
import router from './router'
import './style.css'
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.css"
import "bootstrap-icons/font/bootstrap-icons.css";



createApp(App)
  .use(store)
  .use(router)
  .mount('#app')
