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
              <h3 class="card-title">Lease Activity</h3>
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
                      <div class="post" v-if="!property.leases">
                        <p>
                          <button
                            class="btn btn-small btn-success"
                            @click="newModal"
                          >
                            <i class="fas fa-pen mr-1"></i>
                            Draft Lease
                          </button>
                        </p>
                        <p>No Lease Found</p>

                        <!-- <div v-else-if>B</div> -->
                      </div>
                      <div class="post" v-else>
                        <div class="card-body box-profile">
                          <h5 class="text-primary">Lessee Details</h5>

                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Category</b>
                              <a class="float-right">{{
                                property.leases.type
                              }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Rent (per Month)</b>
                              <a class="float-right">{{
                                property.leases.rent
                              }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Start Date</b>
                              <a class="float-right">{{
                                // moment(property.leases.start).format('LL')
                                formatDate(property.leases.start)
                              }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Duration</b>
                              <a class="float-right">{{
                                property.leases.duration
                              }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Deposit</b>
                              <a class="float-right">{{
                                property.leases.deposit
                              }}</a>
                            </li>

                            <li class="list-group-item">
                              <b>Expiry Date</b>
                              <a
                                class="float-right bg-danger"
                                v-if="endDate <= currDate"
                                >{{ formatDate(endDate) }}</a
                              >
                              <a class="float-right" v-else>
                                {{ formatDate(endDate) }}
                              </a>
                            </li>
                          </ul>

                          <router-link
                            :to="{
                              name: 'lease.edit',
                              params: { id: props.id },
                            }"
                            class="btn btn-sm btn-warning"
                            >Renew/Update Lease Details</router-link
                          >
                          <!-- <button
                            class="btn btn-small btn-success"
                            @click="renewModal"
                          >
                            <i class="fas fa-pen mr-1"></i>
                            Renew lease
                          </button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="col-12 col-md-12 col-lg-4 order-1 order-md-2 mt-4"
                  v-if="property.leases"
                >
                  <h5 class="text-primary">Contact Details</h5>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Name</b>
                      <a class="float-right"
                        >{{ property.leases.fname }}
                        {{ property.leases.lname }}</a
                      >
                    </li>
                    <li class="list-group-item">
                      <b>Email Address</b>
                      <a class="float-right">{{ property.leases.email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone Nmber</b>
                      <a class="float-right">{{ property.leases.phone }}</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center" v-if="property.image">
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
                <li class="list-group-item" v-if="property.leases">
                  <b>Lease Status</b>
                  <span class="float-right bg-danger" v-if="endDate <= currDate"
                    >Expired</span
                  >
                  <a class="float-right" v-else>Active</a>
                </li>
              </ul>

              <div class="text-center mt-5 mb-3">
                <!-- <a href="#" class="btn btn-sm btn-primary">Add files</a> -->
                <router-link
                  :to="{ name: 'properties.edit', params: { id: props.id } }"
                  class="btn btn-sm btn-warning"
                  >Edit Property Details</router-link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Add New Modal -->
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
          <form @submit.prevent="saveLease">
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
                        v-model="form.fname"
                        required
                        type="text"
                        name="fname"
                        placeholder="First Name"
                        class="form-control"
                      />
                    </div>
                    <div class="col-6">
                      <label class="col-sm-8 col-form-label">Last Name*</label>
                      <input
                        v-model="form.lname"
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
                        v-model="form.email"
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
                        v-model="form.phone"
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
                      <!-- For the property id -->
                      <input
                        type="hidden"
                        name="property_id"
                        v-model="form.property_id"
                      />
                      <input
                        v-model="form.start"
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
                        v-model="form.duration"
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
                      <select class="form-control" v-model="form.type" required>
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
                        v-model="form.rent"
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
                        v-model="form.deposit"
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
import useLeases from "../../composables/leases";
import useHelper from "../../composables/helper";
import { onBeforeMount, onMounted, reactive } from "vue";

const { errors, property, getProperty, endDate, currDate } = useProperties();
const { lease, addLease } = useLeases();
const { formatDate, addYears } = useHelper();

const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});

const form = reactive({
  property_id: props.id,
  fname: "",
  lname: "",
  email: "",
  phone: "",
  start: "",
  duration: "",
  rent: "",
  deposit: "",
  type: "",
});

const newModal = () => {
  $("#addNewModal").modal("show");
};

const saveLease = async () => {
  await addLease({ ...form }).then(() => {
    $("#addNewModal").modal("hide");
    getProperty(props.id);

    // console.log(property.value)
  });
};
onBeforeMount(() => {
  getProperty(props.id);
});
</script>