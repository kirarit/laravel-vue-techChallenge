<template>
  <div>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <form @submit.prevent="updateCustomerOrder">
            <div>
              <label>Status</label>
              <select
                name="fleet"
                id="fleet"
                v-model="customerOrder.fleet.name"
                class="
                  block
                  w-full
                  shadow-sm
                  py-3
                  px-4
                  placeholder-gray-500
                  focus:ring-indigo-500 focus:border-indigo-500
                  border-gray-300
                  rounded-md
                "
              >
                <option value="">Please select one</option>
                <option v-for="fleet in fleets" :key="fleet.id" :value="fleet">
                  {{ fleet.name }}
                </option>
              </select>

              <label>Status</label>
              <select
                name="status"
                id="status"
                v-model="customerOrder.status"
                class="
                  block
                  w-full
                  shadow-sm
                  py-3
                  px-4
                  placeholder-gray-500
                  focus:ring-indigo-500 focus:border-indigo-500
                  border-gray-300
                  rounded-md
                "
              >
                <option disabled value="">Please select one</option>
                <option>Pending</option>
                <option>Loading</option>
                <option>Dispatched</option>
                <option>Delivered</option>
              </select>
            </div>
            <button
              type="submit"
              class="
                inline-flex
                justify-center
                mt-4
                py-2
                px-6
                border border-transparent
                shadow-sm
                text-base
                font-medium
                rounded-md
                text-white
                bg-indigo-600
                hover:bg-indigo-700
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-indigo-500
              "
            >
              Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      customerOrder: {},
      fleets: {},
    };
  },

  created() {
    axios.get(`/api/customer-orders/${this.$route.params.id}`).then((res) => {
      this.customerOrder = res.data.customerOrder;
      this.fleets = res.data.fleets;
    });
  },
  methods: {
    updateCustomerOrder() {
      axios
        .patch(
          `/api/customer-orders/${this.$route.params.id}`,
          this.customerOrder
        )
        .then((res) => {
          this.$router.push({ name: "dashboard.index" });
        });
    },
  },
};
</script>
