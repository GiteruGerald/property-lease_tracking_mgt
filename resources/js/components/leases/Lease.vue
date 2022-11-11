<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Lease</h3>

            </div>
            <div class="card-body">
                <form class="space-y-6" @submit.prevent="saveLease">
              <div class="body">
                <div class="form-group">
                  <label class="col-sm-5 col-form-label"
                    >Name of Lease</label
                  >

                  <input
                    v-model="form.name"
                    type="text"
                    name="name"
                    placeholder="Enter Name of Lease"
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label class="col-sm-5 col-form-label">Lease Type</label>
                  <select class="form-control" v-model="form.type">
                    <option value="" disabled>Select Lease Type</option>
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
                    placeholder="Enter Value of Lease"
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
                  <label class="col-sm-2 col-form-label">Profile Photo</label>
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
                    v-model="form.desc"
                    id="exampleFormControlTextarea1"
                    rows="3"
                  ></textarea>
                </div>
              </div>
              <div class="footer">
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
import { reactive } from "vue";


const form  = reactive({

})
</script>
