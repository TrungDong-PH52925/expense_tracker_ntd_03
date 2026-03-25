import axios from 'axios';

// Create an Axios instance with Base URL
const api = axios.create({
    baseURL: "http://127.0.0.1:8000/api",

});

// Add request interceptor to include the token in headers
api.interceptors.request.use(config => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`; // Include the token in the Authorization header
    }
    return config;
});

export default api;

