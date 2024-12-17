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

  getAllAdProductByUserId(user_id) {
    return apiClient.get(`/${user_id}`);
  },
  getAllAdProductsByAuthUser() {
    return apiClient.get('/auth');
  },
};
