<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add New Property</h3>

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
                    v-model="form.name"
                    type="text"
                    name="name"
                    placeholder="Enter Name of Property"
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label class="col-sm-5 col-form-label">Property Type</label>
                  <select class="form-control" v-model="form.type">
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
                    v-model="form.value"
                    type="number"
                    name="value"
                    placeholder="Enter Value of Property"
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label>Location :</label>
                  <input
                    v-model="form.location"
                    type="text"
                    name="location"
                    placeholder="Enter Location"
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-form-label">Featured Image</label>
                  <div class="col-sm-10">
                    <input
                      @change="uploadPic"
                      type="file"
                      class="form-control"
                      style="resize:vertical"
                      name="image"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 col-form-label">Description</label>
                  <textarea
                    class="form-control"
                    v-model="form.description"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    name="description"
                  ></textarea>
                </div>
              </div>
              <div class="footer">
                <button type="submit" class="btn btn-primary">Create</button>
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
import { reactive } from "vue";
import { useToastr } from "../../toastr";

const toastr = useToastr();


const form = reactive({
  name: "",
  type: "",
  value: "",
  location: "",
  image:'',
  description: "",
});

const { errors, storeProperty } = useProperties();

const saveProperty = async () => {
  await storeProperty({ ...form });
};

const uploadPic = (e)=>{
  let file = e.target.files[0];
  // console.log(file);

  let reader = new FileReader();
  let limit = 1024 * 1024* 2;
  if(file['size'] < limit ){ //TODO: Implement file size validate

    reader.onloadend = (file) => {
       form.image = reader.result
    }
  
    reader.readAsDataURL(file); //needed
  }else{
      errors.value = "You are uploading a large file"
  }

  
}
</script>