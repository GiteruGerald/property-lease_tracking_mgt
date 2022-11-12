<template>
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            
            <div class="card-body box-profile">
              <h3 class="profile-username text-center">{{ lease.value.fname }}</h3>
              <p class="text-muted text-center">Property Details</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Category</b> <a class="float-right">{{ lease.type }}</a>
                </li>
                <li class="list-group-item">
                  <b>Value / Price</b>
                  <a class="float-right">{{ lease.lname }}</a>
                </li>
                <li class="list-group-item">
                  <b>Location</b>
                  <a class="float-right">{{ lease.start }}</a>
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
                    ><i class="fas fa-link mr-1"></i> Demo File 1 v2</a
                  >
                </li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import useLeases from "../../composables/leases";

const { lease, addLease, getLease } = useLeases();

const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});

onMounted(()=>{
  getLease(props.id);
  console.log(lease.value)
})
</script>
