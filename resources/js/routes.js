
export default [
    { path: '/home',  component: require('./components/Dashboard.vue').default },
    { path: '/properties', name: 'properties.index',component: require  ('./components/properties/Properties.vue').default },  
    { path: '/properties/create', name: 'properties.create',component: require('./components/properties/PropertiesCreate.vue').default },  
    { path: '/properties/:id', name: 'properties.show',props:true, component: require('./components/properties/PropertiesShow.vue').default },  
    { path: '/property/lease/:id', name: 'lease.edit', props:true ,component: require('./components/leases/LeaseEdit.vue').default },  
    { path: '/properties/:id/edit', name: 'properties.edit', props: true, component: require('./components/properties/PropertiesEdit.vue').default },  
    { path: '/leases', name: 'leases.index',component: require  ('./components/leases/Leases.vue').default },  
];