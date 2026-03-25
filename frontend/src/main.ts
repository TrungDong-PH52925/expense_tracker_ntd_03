import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './route'
import  { createPinia } from 'pinia';

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.mount('#app');
