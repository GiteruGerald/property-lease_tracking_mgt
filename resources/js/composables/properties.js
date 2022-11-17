import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { useToastr } from "../toastr";

export default function useProperties() {

    const toastr = useToastr();
    const property = ref([]);
    const properties = ref([]);

    const errors = ref("");
    const router = useRouter();

    const getProperties = async () => {
        let response = await axios.get("/api/properties");
        properties.value = response.data.data;
    };

    const getProperty = async (id) => {
        let response = await axios.get(`/api/properties/${id}`);
        // property.value = response.data.data;
        property.value = response.data[0];
    };

    const storeProperty = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/properties", data);
            await router.push({ name: "properties.index" });
            toastr.success("Property Added Successfully")

        } catch (e) {
            // if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors;
                // }
            }
            toastr.error("Error adding Property Details")

        }
    };

    const updateProperty = async (id) => {
        errors.value = "";

        try {
            await axios.patch(`/api/properties/${id}`, property.value);
            // await router.push({name:'properties.index'})
            await router.go(-1);
            toastr.info("Property Details Updated Successfully")
        } catch (e) {
            // if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors;
                }
            // }
            toastr.error("Error updating Property Details")

        }
    };

    const destroyProperty = async (id) => {
        try {
            
            await axios.delete(`/api/properties/${id}`);
            toastr.warning('Property deleted Successfully')
        } catch (error) {
            toastr.error("Error Deleting Property, Try Again Later")
            
        }

    };

    const filterByType = (type) => {
        axios
            .get("/api/filter", {
                params: {
                    filter: type,
                },
            })
            .then((response) => (properties.value = response.data));
    };
    const searchProperty = (value) => {
        axios
            .get("/api/search", {
                params: {
                    s: value,
                },
            })
            .then((response) => (properties.value = response.data));
    };
    return {
        errors,
        property,
        properties,
        getProperty,
        getProperties,
        storeProperty,
        updateProperty,
        destroyProperty,
        filterByType,
        searchProperty,
    };
}
