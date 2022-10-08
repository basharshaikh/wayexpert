import axios from "axios";
import store from "./store";

const axiosClient = axios.create({
    baseURL: `http://localhost:8000/api`
})


// https://axios-http.com/docs/interceptors Next time authorize the http request
axiosClient.interceptors.request.use(config => {
    config.headers.Authorization = `Bearer ${store.state.user.token}`;
    return config;
})

export default axiosClient