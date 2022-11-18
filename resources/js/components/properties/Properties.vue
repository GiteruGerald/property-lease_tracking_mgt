<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-12">
                <h3 class="card-title">Properties Table</h3>
              </div>
              <div class="col-md-12">
                <div class="card-tools">
                  <!-- <button class="btn btn-outline-success" @click="newModal">
                    Add New
                    <i class="fas fa-user-plus fa-fw"></i>
                  </button> -->
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group input-group-md" style="width: 150px" >
                        <input
                          type="text"
                          name="table_search"
                          class="form-control float-left"
                          placeholder="Search"
                          v-model="search"
                          @keyup="searchValue"
                        />
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group input-group-md">

                      <select class="form-control" id="" v-model="sort" @change="sortValue">
                        <option value="">--Filter By Type--></option>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Industrial">Industrial</option>
                      </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group input-group-md place-content-end">

                        <button
                          class="btn btn-outline-primary"
                          @click="
                            () => $router.push({ name: 'properties.create' })
                          "
                        >
                          Create New
                        </button>
                        </div>
                    </div>
                  </div>
                 
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
                    <a href="#" @click="confirmPropDelete(property.id)">
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deletePropModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Are you sure you want to delete this property?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button  @click.prevent="deleteProperty(propertyBeingDel)" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import useProperties from "../../composables/properties";
import useLocations from "../../composables/locations";

const { property, properties, getProperties, destroyProperty, filterByType, searchProperty } =
  useProperties();
const { locations, getLocations } = useLocations();

const sort = ref("");
const search = ref("");
const propertyBeingDel = ref('')

const deleteProperty = async (id) => {

  $('#deletePropModal').modal('show')

  // if (!window.confirm("Are you sure you want to delete this property?")) {
  //   return;
  // }
  await destroyProperty(id);
  await $('#deletePropModal').modal('hide')

  await getProperties();

};
const confirmPropDelete = (id) =>{
  propertyBeingDel.value = id
  console.log(propertyBeingDel.value)
  $('#deletePropModal').modal('show')

}
const sortValue = async () => {
  await filterByType(sort.value);
};
const searchValue = async () => {
  await searchProperty(search.value);
};

onMounted(() => {
  getProperties();
  // getLocations();
});
</script>
