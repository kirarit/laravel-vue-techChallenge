function initialState() {
    return {
        item: {
            id: null,
            name: null,
            email: null,
        },

        loading: false,
    };
}

const getters = {
    item: (state) => state.item,
    loading: (state) => state.loading,
};

const actions = {
    storeData({ commit, state, dispatch }) {
        commit("setLoading", true);

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== "object") {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== "object") {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(
                                fieldName + "[" + index + "]",
                                fieldValue[index]
                            );
                        }
                    }
                }
            }

            axios
                .post("/api/customers", params)
                .then((response) => {
                    commit("resetState");
                    resolve();
                })
                .catch((error) => {
                    let message = error.response.data.message || error.message;
                    let errors = error.response.data.errors;

                    reject(error);
                })
                .finally(() => {
                    commit("setLoading", false);
                });
        });
    },
    
    fetchData({ commit, dispatch }, id) {
        axios.get("/api/customers" + id).then((response) => {
            commit("setItem", response.data.data);
        });
    },

    setName({ commit }, value) {
        commit("setName", value);
    },
    setEmail({ commit }, value) {
        commit("setEmail", value);
    },
    resetState({ commit }) {
        commit("resetState");
    },
};

const mutations = {
    setItem(state, item) {
        state.item = item;
    },
    setName(state, value) {
        state.item.name = value;
    },
    setEmail(state, value) {
        state.item.email = value;
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
