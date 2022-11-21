import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import { useToastr } from "../toastr";

export default function useLeases(){
    const router = useRouter()
    const lease =  ref('')
    const leases =  ref([])
    const errors = ref('')
    const currDate = new Date();

    const toastr = useToastr()
    const getLease = async(id)=>{
        let response = await axios.get(`/api/get-lease/${id}`)
        lease.value = response.data[0]
    }

    const getLeases = async () => {
        let response = await axios.get('/api/leases')
        leases.value = response.data.data;

       
    }
    const getLeasesSorted = async () => {
        let response = await axios.get(`/api/leases/sorted`)
        leases.value = response.data.data;

       
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
        leases,
        currDate,
        addLease,
        getLease,
        getLeases,
        getLeasesSorted,
    }
}