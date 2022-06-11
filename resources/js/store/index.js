import Vue from "vue";
import Vuex from "vuex";

import CustomersIndex from "./modules/Customers";
import CustomersSingle from "./modules/Customers/single";
import FleetsIndex from "./modules/Fleets";
import FleetsSingle from "./modules/Fleets/single";
import Dashboard from "./modules/dashboard";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== "production";

export default new Vuex.Store({
    modules: {
        CustomersIndex,
        CustomersSingle,
        FleetsIndex,
        FleetsSingle,
        Dashboard,
    },
    strict: debug,
});
