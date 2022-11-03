<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Properties Table</h3>

            <div class="card-tools">
              <!-- <button class="btn btn-outline-success" @click="newModal">
                Add New
                <i class="fas fa-user-plus fa-fw"></i>
              </button> -->
               <div class="flex mb-4 place-content-end"> -->
                  <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer hover:bg-indigo-700">
                      <router-link :to="{ name: 'properties.create' }" class="text-sm font-medium">Create Property</router-link>
                  </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Price</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(property, index) in properties" :key="property.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ property.name }}</td>
                  <td>{{ property.type }}</td>
                  <td>{{ property.value }}</td>
                  <!-- <td>{{ property.location }}</td> -->
                  <!-- <td></td> -->
                  <td>
                    <a href="#">
                      <i class="fa fa-edit"></i>
                    </a>
                    /
                    <a href="#" @click="deleteProperty(property.id)">
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
            <h5 class="modal-title" id="addNewModalLabel">Add Property</h5>
  
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
  
          <form @submit.prevent="createProperty()">
            <div class="modal-body">
              <div class="modal-body">
                <div class="form-group">
                  <label class="col-sm-5 col-form-label">Name of Property</label>
  
                  <input
                    v-model="form.name"
                    type="text"
                    name="name"
                    placeholder="Enter User name"
                    class="form-control"
                  />
  
                  <div class="form-group">
                    <label class="col-sm-5 col-form-label">Property Type</label>
                    <select class='form-control' v-model='form.type'>
                                <option value='0' >Select Location</option>
                                <option value='Residential'>Residential</option>
                                <option value='Commercial'>Commercial</option>
                                <option value='Industrial'>Industrial</option>
                            </select>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 col-form-label">Price/Value</label>
  
                    <input
                      v-model="form.value"
                      type="number"
                      name="value"
                      placeholder="Enter Value of Property"
                      class="form-control"
                    />
                  </div>
                  <div class="form-group">
                            <label>Select Location:</label>
                            <select class='form-control' v-model='form.location'>
                                <option value='0' >Select Location</option>
                                <option v-for='data in locations' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 col-form-label">Description</label>
                    <textarea class="form-control" v-model="form.desc" id="exampleFormControlTextarea1" rows="3"></textarea>
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

<!-- <script setup>
import useProperties from '../composables/properties';
import { onMounted } from 'vue';

const {properties, getProperies} = useProperties()

</script> -->
<script setup>
import axios from "axios";
import { ref, onMounted, reactive, onBeforeMount } from "vue";

const properties = ref({});
const locations = ref({});
const form = reactive({
    name:"",
    type:"",
    value:"",
    location:"",
    description:"",
});
const newModal = () => {
  $("#addNewModal").modal("show");
};

const getProperties = ()=>{
    axios.get("/api/properties")
        .then((response)=>{
            properties.value = response.data.data;
            // console.log(response.data);
        })
};

const getLocations = ()=>{
  axios.get('/api/locations')
    .then((response)=>{
        locations.value = response.data;
    })
}

  const createProperty = ()=>{
        try {
            axios.post('/api/properties', form)
              .then((response)=>{
                form.name = '';
                form.type = '';
                form.location = '';
                form.price = '';
                form.description= '';

                $('#addNewModal').modal('hide')
              })
            // await router.push({name:'properties.index'})
        } catch (e) {
            console.log(e.message)
        }
    }

  const deleteProperty = (id)=>{
    if (!window.confirm('You sure?')) {
        return
      }else{

        try {
          axios.delete(`/api/properties/${id}`)
          
        } catch (error) {
          console.log(error.message)
        }
      }
  }

onMounted(()=>{
    getProperties();
    getLocations();
})
</script>
