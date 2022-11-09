<template>
  <div class="container">
    <section class="content-header">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1>{{ property.name }}</h1>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">{{ property.name }}</h3>
              <div class="card-tools">
              <button class="btn btn-outline-info" @click="()=>$router.push({name:'properties.index'})">Back</button>
          </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                  <div class="row">
                    <div class="col-12">
                      <h4>Recent Activity</h4>
                      <div class="post">
                        <p>
                          {{property.description}}
                        </p>
                        <p>
                          <a href="#" class="link-black text-sm btn btn-success"
                            ><i class="fas fa-link mr-1"></i> Draft your first lease 
                            </a
                          >
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                  <h3 class="text-primary">
                    <i class="fas fa-paint-brush"></i> AdminLTE v3
                  </h3>
                  <p class="text-muted">
                    Raw denim you probably haven't heard of them jean shorts
                    Austin. Nesciunt tofu stumptown aliqua butcher retro
                    keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui
                    irure terr.
                  </p>
                  <br />
                  <div class="text-muted">
                    <p class="text-sm">
                      Client Company
                      <b class="d-block">Deveint Inc</b>
                    </p>
                    <p class="text-sm">
                      Project Leader
                      <b class="d-block">Tony Chicken</b>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img
                  class="profile-user-img img-fluid"
                  :src="'/img/property/'+ property.image"
                  style="width:360px;height: 150px;"
                  :alt="property.image"
                />
              </div>
              <h3 class="profile-username text-center">{{ property.name }}</h3>
              <p class="text-muted text-center">Property Details</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Category</b> <a class="float-right">{{ property.type }}</a>
                </li>
                <li class="list-group-item">
                  <b>Value / Price</b> <a class="float-right">{{ property.value }}</a>
                </li>
                <li class="list-group-item">
                  <b>Location</b> <a class="float-right">{{ property.location }}</a>
                </li>
                <li class="list-group-item">
                  <b>Lease Status</b> <a class="float-right">Active/Inactive</a>
                </li>
              </ul>
              <h5 class="mt-5 text-muted">Lease files</h5>
                  <ul class="list-unstyled">
                    <li>
                      <a href="" class="btn-link text-secondary"
                        ><i class="far fa-fw fa-file-word"></i>
                        Functional-requirements.docx</a
                      >
                    </li>
                    <li>
                      <a href="" class="btn-link text-secondary"
                        ><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a
                      >
                    </li>
                    <li>
                      <a href="#" class="link-black text-sm"
                            ><i class="fas fa-link mr-1"></i> Demo File 1
                            v2</a>
                    </li>
                  </ul>
                  <div class="text-center mt-5 mb-3">
                    <a href="#" class="btn btn-sm btn-primary">Add files</a>
                    <router-link :to="{name: 'properties.edit', params: {id: property.id}}" class="btn btn-sm btn-warning"
                      >Edit Property Details</router-link>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
  
  <script setup>
import useProperties from "../../composables/properties";
import { onBeforeMount } from "vue";

const { errors, property, getProperty } = useProperties();
const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});
onBeforeMount(() =>
 getProperty(props.id)
//  console.log(props.image);
 );
</script>