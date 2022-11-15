import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default function useLeases(){
    const router = useRouter()
    const lease =  ref('')
    const errors = ref('')

    const getLease = async(id)=>{
        let response = await axios.get(`/api/get-lease/${id}`)
        lease.value = response.data[0]
    }
    const addLease = async (data) =>{
        errors.value = ''
        try {
            await axios.post('/api/leases', data)
            // await router.push({name:'lease.show'})
            // await router.go(-1)
        } catch (e) {
            if(e.response.status === 422 ){
                for(const key in e.response.data.errors){
                    errors.value =e.response.data.errors
                }
            }
        }
    }

    


    return{
        errors,
        lease,
        addLease,
        getLease
    }
}