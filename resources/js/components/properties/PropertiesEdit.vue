<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Property</h3>

            <div class="card-tools">
              <button
                class="btn btn-outline-success"
                @click="() => $router.push({ name: 'properties.index' })"
              >
                Back
              </button>
            </div>
          </div>

          <div class="card-body">
            <form class="space-y-6" @submit.prevent="saveProperty">
              <div class="body">
                <div class="form-group">
                  <label class="col-sm-5 col-form-label"
                    >Name of Property</label
                  >

                  <input
                    v-model="property.name"
                    type="text"
                    name="name"
                    placeholder="Enter User name"
                    class="form-control"
                  />
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 col-form-label"
                      >Property Type</label
                    >
                    <select class="form-control" v-model="property.type">
                      <option value="" disabled>Select Property Type</option>
                      <option value="Residential">Residential</option>
                      <option value="Commercial">Commercial</option>
                      <option value="Industrial">Industrial</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 col-form-label"
                      >Price/Value (KES)</label
                    >

                    <input
                      v-model="property.value"
                      type="number"
                      name="value"
                      placeholder="Enter Value of Property"
                      class="form-control"
                    />
                  </div>
                  <div class="form-group">
                    <label>Location :</label>
                    <input
                      v-model="property.location"
                      type="text"
                      name="location"
                      placeholder="Enter Location"
                      class="form-control"
                    />
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-form-label"
                        >Profile Photo</label
                      >
                        <input
                          @change="uploadPic"
                          type="file"
                          class="form-control"
                          name="featured_image"
                        />
                  </div>
                <div class="form-group">
                  <label class="col-sm-5 col-form-label">Description</label>
                  <textarea
                    class="form-control"
                    v-model="property.description"
                    id="exampleFormControlTextarea1"
                    rows="3"
                  ></textarea>
                </div>
              </div>
              <div class="footer">
                <button type="submit" class="btn btn-primary">
                  Submit Changes
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script setup>
import useProperties from "../../composables/properties";
import { reactive, onMounted } from "vue";

const { errors, property, updateProperty, getProperty } = useProperties();
const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});
onMounted(() => getProperty(props.id));

const uploadPic = (e)=>{
  console.log("uploading")
}
const saveProperty = async () => {
  await updateProperty(props.id);
};
</script>