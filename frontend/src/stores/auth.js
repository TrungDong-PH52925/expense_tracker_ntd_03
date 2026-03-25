import { defineStore } from 'pinia'; // create a store (state, actions, getters)
import api from '../api/axios';

export const useAuth = defineStore("auth", {
    state: () => ({
        token: localStorage.getItem("token") || null
    }),
    actions: {
        async login(data) {
            const res = await api.post("/login", data);
            this.token = res.data.token;
            localStorage.setItem("token", this.token);

        }
    }
});

