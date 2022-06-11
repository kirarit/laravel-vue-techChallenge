function initialState() {
    return {
        all: [],
        query: {},
        loading: false,
    };
}

const getters = {
    data: (state) => state.all,
    total: (state) => state.all.length,
    loading: (state) => state.loading,
};

const actions = {
    fetchData({ commit, state }) {
        commit("setLoading", true);

        axios
            .get("/api/customer-orders")
            .then((response) => {
                console.log(response.data.data)
                commit("setAll", response.data.data);
            })
            .catch((error) => {
                message = error.response.data.message || error.message;
                commit("setError", message);
                console.log(message);
            })
            .finally(() => {
                commit("setLoading", false);
            });
    },
    resetState({ commit }) {
        commit("resetState");
    },
};

const mutations = {
    setAll(state, items) {
        state.all = items;
    },
    setLoading(state, loading) {
        state.loading = loading;
    },
    resetState(state) {
        state = Object.assign(state, initialState());
    },
};

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations,
};
