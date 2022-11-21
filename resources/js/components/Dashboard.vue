<template>
  <div class="container">
    <div class="row mt-5">
      <section class="content">
        <div class="row">
          <div class="col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ properties.length }}</h3>
                <p>New Properties</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-house"></i>
              </div>
              <router-link
                :to="{ name: 'properties.index' }"
                class="small-box-footer"
              >
                More info <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>

          <div class="col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h5>Properties</h5>
                <p>Add New</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-plus"></i>
              </div>

              <router-link
                :to="{ name: 'properties.create' }"
                class="small-box-footer"
              >
                More info <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>

          <div class="col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ leases.length }}</h3>
                <p>Leases</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file-contract"></i>
              </div>
              <router-link
                :to="{ name: 'leases.index' }"
                class="small-box-footer"
              >
                More info <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="card direct-chat direct-chat-primary">
            <div class="card-header">
              <h3 class="card-title">Direct Chat</h3>
              <div class="card-tools">
                
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="collapse"
                >
                  <i class="fas fa-minus"></i>
                </button>
                
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="remove"
                >
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              
            </div>

            <div class="card-footer">
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Property Name</th>
                  <th>Registered</th>
                  <th>Duration</th>
                  <th>Type</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(lease, index) in leases" :key="lease.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ lease.property.name }}</td>
                  <td>{{ lease.start }}</td>
                  <td>{{ lease.type }}</td>
                  <td>{{ lease.duration }}</td>
                  <td v-if="lease.start <= currDate">Expired</td>
                  <td v-else>Active</td>
                  
                </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "@vue/runtime-core";
import useProperties from "../composables/properties";
import useLeases from "../composables/leases";

const { properties, getProperties } = useProperties();
const { leases, getLeasesSorted } = useLeases();

onMounted(() => {
  getProperties();
  getLeasesSorted();
});
</script>
