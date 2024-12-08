import adProductService from '@/services/adProductService';
import { ref } from 'vue';


export default class useAdProducts {
  constructor() {
    const adproducts = ref([]);
    const loading = ref(false);
    const error = ref(null);

    const fetchAdProducts = async () => {
      loading.value = true;
      try {
        const response = await adProductService.getAdProducts();        
        adproducts.value.splice(0, adproducts.value.length, ...response.data);
      } catch (err) {
        error.value = err.message;
      } finally {
        loading.value = false;
      }
    };

    return { adproducts, fetchAdProducts, loading, error };
  }
}