
export default [
    { path: '/home',  component: require('./components/Dashboard.vue').default },
    { path: '/properties', name: 'properties.index',component: require  ('./components/properties/Properties.vue').default },  
    { path: '/properties/create', name: 'properties.create',component: require('./components/properties/PropertiesCreate.vue').default },  
    { path: '/properties/:id/edit', name: 'properties.edit', props: true, component: require('./components/properties/PropertiesEdit.vue').default },  
    { path: '/locations', component: require('./components/Location.vue').default },  
];