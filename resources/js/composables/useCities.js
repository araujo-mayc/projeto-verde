import { reactive, ref } from 'vue';
import cityService from '../services/cityService';

export default class useCities {
  constructor() {
    const cities = ref([]);
    const loading = ref(false);
    const error = ref(null);

    const fetchCities = async () => {
      loading.value = true;
      try {
        const response = await cityService.getCities();
        cities.value.splice(0, cities.value.length, ...response.data);
      } catch (err) {
        error.value = err.message;
      } finally {
        loading.value = false;
      }
    };

    return { cities, fetchCities, loading, error };
  }
}