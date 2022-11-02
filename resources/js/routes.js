
export default [
    { path: '/home',  component: require('./components/Dashboard.vue').default },
    { path: '/properties', name: 'properties.index',component: require('./components/Properties.vue').default },  
    { path: '/locations', component: require('./components/Location.vue').default },  
];