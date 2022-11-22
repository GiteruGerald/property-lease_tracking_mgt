<template>
  <div class="container mt-5">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Lease Details</h3>

            <div class="card-tools">
              <button
                class="btn btn-outline-success"
                @click="() => $router.go(-1)"
              >
                Back
              </button>
            </div>
          </div>

          <div class="card-body">
            <form class="space-y-6" @submit.prevent="saveLease">
              <div class="body">
                <fieldset>
                  <legend>Contact Details</legend>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label class="col-sm-8 col-form-label"
                          >Name of Lessee*</label
                        >

                        <input
                          v-model="lease.fname"
                          required
                          type="text"
                          name="fname"
                          placeholder="First Name"
                          class="form-control"
                        />
                      </div>
                      <div class="col-6">
                        <label class="col-sm-8 col-form-label"
                          >Last Name*</label
                        >
                        <input
                          v-model="lease.lname"
                          required
                          type="text"
                          name="lname"
                          placeholder="Last Name"
                          class="form-control"
                        />
                        <span v-if="errors">{{ errors }}</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label class="col-sm-8 col-form-label"
                          >Email Address*</label
                        >
                        <input
                          v-model="lease.email"
                          required
                          type="email"
                          name="email"
                          placeholder="someone@example.com"
                          class="form-control"
                        />
                      </div>
                      <div class="col-6">
                        <label class="col-sm-8 col-form-label"
                          >Phone Contact*</label
                        >
                        <input
                          v-model="lease.phone"
                          required
                          type="text"
                          name="phone"
                          placeholder="+254 7..."
                          class="form-control"
                        />
                      </div>
                    </div>
                  </div>
                </fieldset>
                <hr />
                <fieldset>
                  <legend>Lease Terms</legend>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label>Start Date* :</label>
                        <input
                          v-model="lease.start"
                          required
                          type="date"
                          name="start_date"
                          placeholder="Start date of Lease"
                          class="form-control"
                        />
                      </div>
                      <div class="col-3">
                        <label>Duration(Years)* :</label>
                        <input
                          v-model="lease.duration"
                          required
                          type="number"
                          name="duration"
                          placeholder="End date of Lease"
                          class="form-control"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-5">
                        <label class="col-8 col-form-label">Lease Type *</label>
                        <select
                          class="form-control"
                          v-model="lease.type"
                          required
                        >
                          <option value="" disabled>Select Lease Type</option>
                          <option value="Full-Service Lease/Gross Lease">
                            Full-Service Lease/Gross Lease
                          </option>
                          <option value="Net Lease">Net Lease</option>
                          <option value="Absolute Lease">Absolute Lease</option>
                          <option value="Percentage Lease">
                            Percentage Lease
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label class="col-sm-5 col-form-label"
                          >Rent(/Month)</label
                        >
                        <input
                          v-model="lease.rent"
                          required
                          type="number"
                          name="value"
                          placeholder="Enter rent charges"
                          class="form-control"
                        />
                      </div>
                      <div class="col-6">
                        <label class="col-sm-8 col-form-label"
                          >Security Deposit</label
                        >
                        <input
                          v-model="lease.deposit"
                          required
                          type="number"
                          name="value"
                          placeholder="Enter amount of security deposit"
                          class="form-control"
                        />
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="footer">
                <button type="submit" class="btn btn-primary">
                  Submit Changes
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- <section class="content">
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
    </section> -->
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import useLeases from "../../composables/leases";

const { lease, getLease, updateLease } = useLeases();

const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});

const saveLease = async () => {
  await updateLease(props.id);
};
onMounted(() => {
  getLease(props.id);
});
</script>
