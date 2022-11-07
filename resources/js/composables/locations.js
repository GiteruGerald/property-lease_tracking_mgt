import {ref} from 'vue';
import axios from 'axios'
import { useRouter } from 'vue-router';

export default function useLocations(){
    const locations = ref([])
    
    const errors = ref('')
    const router = useRouter()

    const getLocations = async ()=>{
        let response = await axios.get('api/locations')
        locations.value = response.data.data
    }

    return{
        errors,
        locations,
        getLocations,
    }
}


