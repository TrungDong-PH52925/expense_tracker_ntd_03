<script setup>
import { ref } from 'vue';
import { useAuth } from '../stores/auth';
import { useRouter } from 'vue-router';

const auth = useAuth();
const router = useRouter();

const email = ref("");
const password = ref("");

const login = async () =>{
    await auth.login({
        email: email.value,
        password: password.value
    });
    router.push("/");
}
</script>

<template>
    <div class="max-w-sm mx-auto mt-20">
        <h2 class="text-xl mb-4">Login</h2>
        <input v-model="email" placeholder="Email" type="text" class="border p-2 w-full mb-2"/>
        <input v-model="password" placeholder="Password" type="password" class="border p-2 w-full mb-2"/>
        <button @click="login" class="bg-blue-500 text-white px-4 py-2 w-full">Login</button>

    </div>
</template>
