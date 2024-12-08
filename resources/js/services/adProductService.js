import axios from 'axios';

const apiClient = axios.create({
  baseURL: '/adproducts',
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
});

export default {
  getAdProducts() {
    return apiClient.get('/');
  },

  getById(Id) {
    return apiClient.get(`/${Id}`);
  },
};
