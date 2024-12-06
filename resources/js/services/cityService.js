import axios from 'axios';

const apiClient = axios.create({
  baseURL: '/cities',
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
});

export default {
  getCities() {
    return apiClient.get('/');
  },
};
