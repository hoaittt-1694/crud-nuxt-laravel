import axios from "axios"

const apiUrl = 'http://localhost:8000/api'

axios.defaults.baseURL = apiUrl;

export default axios;