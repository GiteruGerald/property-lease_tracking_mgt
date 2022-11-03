<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add New Property</h3>

            <div class="card-tools">
                <button class="btn btn-outline-success" @click="()=>$router.push({name:'properties.index'})">Back</button>
            </div>
          </div>

          <div class="card-body">
            <form class="space-y-6" @submit.prevent="saveProperty">
              <div class="modal-body">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-sm-5 col-form-label"
                      >Name of Property</label
                    >

                    <input
                      v-model="form.name"
                      type="text"
                      name="name"
                      placeholder="Enter User name"
                      class="form-control"
                    />

                    <div class="form-group">
                      <label class="col-sm-5 col-form-label"
                        >Property Type</label
                      >
                      <select class="form-control" v-model="form.type">
                        <option value="0">Select Location</option>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Industrial">Industrial</option>
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
                      <select class="form-control" v-model="form.location">
                        <option value="0">Select Location</option>
                        <option v-for="data in locations" :value="data.id">
                          {{ data.name }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 col-form-label">Description</label>
                    <textarea
                      class="form-control"
                      v-model="form.desc"
                      id="exampleFormControlTextarea1"
                      rows="3"
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                >
                  Close
                </button>
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

const form = reactive({
  name: "",
  type: "",
  value: "",
  location: "",
  description: "",
});

const { errors, storeProperty } = useProperties();

const saveProperty = async () => {
  await storeProperty({ ...form });
};
</script>