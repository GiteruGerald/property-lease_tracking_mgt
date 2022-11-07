import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

export default function useProperties(){
    const property = ref([])
    const properties = ref([])

    const errors = ref('')
    const router = useRouter()

    const getProperties = async ()=>{
        let response = await axios.get('/api/properties')
        properties.value = response.data.data
    }
    
    const getProperty = async (id)=>{
        let response = await axios.get(`/api/properties/${id}`)
        property.value = response.data.data
        console.log(id);
    }

    const storeProperty = async (data)=>{
        errors.value = ''
        try {
            await axios.post('/api/properties', data)
            await router.push({name:'properties.index'})
        } catch (e) {
            if(e.response.status === 422){
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const updateProperty = async (id)=>{
        errors.value = ''
        
        try {
            await axios.patch(`/api/properties/${id}`, property.value)  
            await router.push({name:'properties.index'})

        } catch (e) {
            if(e.response.status === 422){
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const destroyProperty = async (id) => {
        await axios.delete(`/api/properties/${id}`);
    }

    return {
        errors,
        property,
        properties,
        getProperty,
        getProperties,
        storeProperty,
        updateProperty,
        destroyProperty
    }
}