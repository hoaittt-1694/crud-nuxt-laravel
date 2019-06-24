import axios from "./config";

export function callApiFetch(params = {}) {
    return axios.get('/users', { params });
}

export function callApiAdd(params) {
    return axios.post('/users', params)
        .then(response => response)
        .catch(error => error)
}

export function callApiEdit(id, params) {
    return axios.put(`/users/${id}`, params)
        .then(response => response)
        .catch(error => error);
        
}

export function callApiDelete(id) {
    return axios.delete(`/users/${id}`)
        .then(response => response)
        .catch(error => error);
}

export function callApiShow(id) {
    return axios.get(`/users/${id}`)
        .then(response => response)
        .catch(error => error);
}