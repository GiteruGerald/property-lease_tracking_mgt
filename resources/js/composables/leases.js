import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import { useToastr } from "../toastr";

export default function useLeases(){
    const router = useRouter()
    const lease =  ref('')
    const errors = ref('')

    const toastr = useToastr()
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
            toastr.success("Lease Application Added Successfully")
        } catch (e) {
            toastr.error("Error adding Lease Details")
            
        }
    }

    


    return{
        errors,
        lease,
        addLease,
        getLease
    }
}