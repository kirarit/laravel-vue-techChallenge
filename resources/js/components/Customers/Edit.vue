<template>
  <div>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <form @submit.prevent="updateCustomer">
            <div>
              <label>Name</label>
              <input
                type="text"
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
                v-model="customer.name"
              />
            </div>
            <div>
              <label>Email</label>
              <input
                type="email"
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
                v-model="customer.email"
              />
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
      customer: {},
    };
  },

  created() {
    axios.get(`/api/customers/${this.$route.params.id}`).then((res) => {
      this.customer = res.data;
    });
  },
  methods: {
    updateCustomer() {
      axios
        .patch(`/api/customers/${this.$route.params.id}`, this.customer)
        .then((res) => {
          this.$router.push({ name: "customers.index" });
        });
    },
  },
};
</script>
