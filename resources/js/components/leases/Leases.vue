<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Leases</h3>

            <div class="card-tools">
              <button class="btn btn-outline-success"
              @click="() => $router.go(-1)"
              >
                Back
              </button>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Property Name</th>
                  <th>Registered At</th>
                  <th>Type</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(lease, index) in leases" :key="lease.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ lease.property.name }}</td>
                  <td>{{ formatDate(lease.start) }}</td>
                  <td>{{ lease.type }}</td>
                  <td>{{ lease.duration }}</td>
                  <td>{{ checkYears(lease.start, lease.duration) }}</td>
                  <td>
                    <router-link
                      :to="{
                        name: 'properties.show',
                        params: { id: lease.property_id },
                      }"
                      class="mr-2 ..."
                    >
                    <i class="fa fa-eye"></i>

                    </router-link>
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
import { onMounted } from "vue";
import  useLeases  from '../../composables/leases'
import useHelper from '../../composables/helper'
const currDate = new Date();

const { leases, getLeases} = useLeases()
const { formatDate, checkYears } = useHelper()


onMounted(() => {
  getLeases();
  console.log(currDate)
});
</script>
