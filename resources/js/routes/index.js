import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import CustomersIndex from "../components/Customers/Index.vue";
import CustomersCreate from "../components/Customers/Create.vue";
import CustomersEdit from "../components/Customers/Edit.vue";
import FleetsIndex from "../components/Fleets/Index.vue";
import FleetsCreate from "../components/Fleets/Create.vue";
import FleetsEdit from "../components/Fleets/Edit.vue";
import Dashboard from "../components/Dashboard.vue";
import CustomerOrdersEdit from "../components/CustomerOrders/Edit.vue";

const routes = [
    { path: "/customers", component: CustomersIndex, name: "customers.index" }, 
    { path: "/customers/create", component: CustomersCreate, name: "customers.create",},
    { path: "/customers/edit/:id", component: CustomersEdit, name: "customers.edit",},
    { path: "/fleet", component: FleetsIndex, name: "fleets.index" },
    { path: "/fleets/create", component: FleetsCreate, name: "fleets.create" },
    { path: "/fleets/edit/:id", component: FleetsEdit, name: "fleets.edit",},
    { path: "/", component: Dashboard, name: "dashboard.index" },
    { path: "/CustomerOrdersEdit/edit/:id", component: CustomerOrdersEdit, name: "customer.orders.edit",},
];

export default new VueRouter({
    mode: "history",
    base: "/dashboard",
    routes,
});
