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
                  <th>Price/Value</th>
                  <th>Location</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(property, index) in properties" :key="property.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ property.name }}</td>
                  <td>{{ property.type }}</td>
                  <td>{{ property.value }}</td>
                  <td>{{ property.location }}</td>
                  <td>
                    
                    <router-link
                      :to="{
                        name: 'properties.show',
                        params: { id: property.id },
                      }"
                      class="mr-2 ..."
                    >
                    <i class="fa fa-eye blue"></i>
                    </router-link>
                    
                    /
                    <router-link
                      :to="{
                        name: 'properties.edit',
                        params: { id: property.id },
                      }"
                      class="mr-2 ..."
                    >
                      <i class="fa fa-edit orange"></i>
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

<script setup>
import axios from "axios";
import { ref, onMounted} from "vue";
import useProperties from '../../composables/properties'
import useLocations from '../../composables/locations'
const { properties, getProperties, destroyProperty} = useProperties()
const {locations, getLocations} = useLocations()

const deleteProperty = async (id) => {
  if (!window.confirm("You sure?")) {
    return;
  } 
  await destroyProperty(id);
  await getProperties();
};

onMounted(() => {
  getProperties();
  getLocations();
});
</script>
