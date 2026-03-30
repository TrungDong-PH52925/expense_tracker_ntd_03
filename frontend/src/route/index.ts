import { createRouter, createWebHistory} from 'vue-router';
import type { RouteRecordRaw} from "vue-router";
import Login from '../views/Login.vue';
import Dashboard from '../views/Dashboard.vue';

// Định nghĩa đường dẫn và các component tương ứng của chúng.
const routes : RouteRecordRaw[] = [
    { path: "/login", name: 'Login', component: Login},
    { path: "/", name: 'Dashboard', component: Dashboard},
];

// Tạo router instance và truyền vào các định nghĩa đường dẫn.

const router = createRouter({
    history: createWebHistory(),
    routes,
});
// Chưa đăng nhập thì chuyển hướng sang trang Login, nếu không thì cho phép truy cập vào cách trang đích mong muốn.
router.beforeEach((to, _) =>{
    const token = localStorage.getItem("token");

    if (!token && to.path !== "/login"){
        return("/login");
    }
});

export default router;

