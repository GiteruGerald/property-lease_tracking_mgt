<template>
  <div class="container mt-5">
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <h3 class="profile-username text-center">
                {{ lease.fname }}{{ lease.lname }}
              </h3>
              <p class="text-muted text-center">Contact Details</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Name</b>
                  <a class="float-right">{{ lease.fname }}{{ lease.lname }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email Address</b>
                  <a class="float-right">{{ lease.email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Phone Nmber</b>
                  <a class="float-right">{{ lease.phone }}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <p class="text-muted text-center">Lease Details</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Category</b> <a class="float-right">{{ lease.property }}</a>
                </li>
                <li class="list-group-item">
                  <b>Rent (per Month)</b>
                  <a class="float-right">{{ lease.rent }}</a>
                </li>
                <li class="list-group-item">
                  <b>Start Date</b>
                  <a class="float-right">{{ lease.start }}</a>
                </li>
                <li class="list-group-item">
                  <b>Duration</b>
                  <a class="float-right">{{ lease.duration }}</a>
                </li>
                <li class="list-group-item">
                  <b>Deposit</b>
                  <a class="float-right">{{ lease.deposit }}</a>
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

        <div class="col-md-3 float-right">
          <button class="btn btn-outline-success"
          @click="()=> $router.go(-1)"
          >
          Back
          </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import useLeases from "../../composables/leases";

const { lease, getLease } = useLeases();

const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});

onMounted(() => {
  getLease(props.id);
});
</script>
