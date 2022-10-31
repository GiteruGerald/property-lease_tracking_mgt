<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Locations</h3>

            <div class="card-tools">
              <button class="btn btn-outline-success" @click="newModal">
                Add New
                <i class="fas fa-user-plus fa-fw"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(location, index) in locations" :key="location.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ location.name }}</td>
                  <td>
                    <a href="#">
                      <i class="fa fa-edit"></i>
                    </a>
                    /
                    <a href="#">
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addNewModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewModalLabel">Add Location</h5>
  
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
  
          <form @submit.prevent="createLocation()">
            <div class="modal-body">
              <div class="modal-body">
                <div class="form-group">
                  <label class="col-sm-5 col-form-label">Name of Location</label>
  
                  <input
                    v-model="form.name"
                    type="text"
                    name="name"
                    placeholder="Enter User name"
                    class="form-control"
                  />
 
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</template>

<script setup>
import axios from "axios";
import { ref, onMounted, reactive } from "vue";

const locations = ref({});
const form = reactive({
    name:"",
   
});
const newModal = () => {
  $("#addNewModal").modal("show");
};

const getLocations = ()=>{
    axios.get("/api/locations")
        .then((response)=>{
            locations.value = response.data;
        })
};

const createLocation = ()=>{
  axios.post('api/locations', form)
    .then((response)=>{
      form.name = '';
      $("#addNewModal").modal("hide");

    })
    .catch((er)=>{
      console.log(er)
    })
}

onMounted(()=>{
    getLocations();
})
</script>
