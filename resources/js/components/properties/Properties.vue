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
              <div class="flex mb-4 place-content-end">
                <div class="px-4 py-2">
                  <!-- <router-link :to="{ name: 'properties.create' }" class="text-sm font-medium">Create Property</router-link> -->
                  <button
                    class="btn btn-outline-primary"
                    @click="() => $router.push({ name: 'properties.create' })"
                  >
                    Create New
                  </button>
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
                    <router-link
                      :to="{
                        name: 'properties.edit',
                        params: { id: property.id },
                      }"
                      class="mr-2 ..."
                    >
                      <i class="fa fa-edit"></i>
                    </router-link>

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
import useProperties from '../../composables/properties'
const locations = ref({});

const { properties, getProperties} = useProperties()
const getLocations = () => {
  axios.get("/api/locations").then((response) => {
    locations.value = response.data;
  });
};

const deleteProperty = (id) => {
  if (!window.confirm("You sure?")) {
    return;
  } else {
    try {
      axios.delete(`/api/properties/${id}`);
    } catch (error) {
      console.log(error.message);
    }
  }
};

onMounted(() => {
  getProperties();
  getLocations();
});
</script>
