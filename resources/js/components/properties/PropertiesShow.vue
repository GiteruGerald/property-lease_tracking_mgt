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
              <h3 class="card-title">{{ property.name }}{{ property.id }}</h3>
              <div class="card-tools">
                <button
                  class="btn btn-outline-info"
                  @click="() => $router.push({ name: 'properties.index' })"
                >
                  Back
                </button>
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
                          {{ property.description }}
                        </p>
                        <p>
                          <button
                            class="btn btn-small btn-success"
                            @click="newModal"
                          >
                            <i class="fas fa-pen mr-1"></i>
                            Draft your first lease
                          </button>
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
                  :src="'/img/property/' + property.image"
                  style="width: 360px; height: 150px"
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
                  <b>Value / Price</b>
                  <a class="float-right">{{ property.value }}</a>
                </li>
                <li class="list-group-item">
                  <b>Location</b>
                  <a class="float-right">{{ property.location }}</a>
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
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <router-link
                  :to="{ name: 'properties.edit', params: { id: property.id } }"
                  class="btn btn-sm btn-warning"
                  >Edit Property Details</router-link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    !-- Add New Modal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Apply Lease for {{ property.name }}</h5>

            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="">
            <div class="modal-body">
              <fieldset>
                <legend>Lessee Details</legend>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label class="col-sm-8 col-form-label"
                        >Name of Lessee*</label
                      >

                      <input
                      v-model="form.fname" required
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
                      v-model="form.lname" required
                        type="text"
                        name="lname"
                        placeholder="Last Name"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6"><label class="col-sm-8 col-form-label"
                        >Email Address*</label
                      >
                      <input
                      v-model="form.email" required
                      type="email"
                        name="email"
                        placeholder="someone@example.com"
                        class="form-control"
                      /></div>
                    <div class="col-6"><label class="col-sm-8 col-form-label"
                        >Phone Contact*</label
                      >
                      <input
                      v-model="form.phone" required
                      type="text"
                        name="phone"
                        placeholder="+254 7..."
                        class="form-control"
                      /></div>
                  </div>
                </div>
              </fieldset>
              <hr>
              <fieldset>
                <legend>Lease Terms</legend>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label>Start Date* :</label>
                    <input
                    v-model="form.start" required
                    type="date"
                    name="start_date"
                      placeholder="Start date of Lease"
                      class="form-control"
                      />
                      
                    </div>
                    <div class="col-3">
                      <label>Duration(In Years)* :</label>
                      <input
                      v-model="form.duration" required
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
                      <select class="form-control" v-model="form.type" required>
                        <option value="" disabled>Select Lease Type</option>
                        <option value="Full-Service Lease/Gross Lease">Full-Service Lease/Gross Lease</option>
                        <option value="Net Lease">Net Lease</option>
                        <option value="Absolute Lease">Absolute Lease</option>
                        <option value="Percentage Lease">Percentage Lease</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-6">

                      <label class="col-sm-5 col-form-label">Rent(/Month)</label>
                      <input
                    v-model="form.rent" required
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
                      v-model="form.deposit" required
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
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>

              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script setup>
import useProperties from "../../composables/properties";
import { onBeforeMount, reactive } from "vue";

const { errors, property, getProperty } = useProperties();
const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});

const form = reactive({
    fname:'',
    lname:'',
    email:'',
    phone:'',
    start:'',
    duration:'',
    rent :'',
    deposit:'',
    type:'',
});

const newModal = () => {
  $("#addNewModal").modal("show");
};

onBeforeMount(
  () => getProperty(props.id)
  //  console.log(props.image);
);
</script>