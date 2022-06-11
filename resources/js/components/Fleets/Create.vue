<template>
  <div>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <form @submit.prevent="submitForm" novalidate>
            <div class="mt-3">
              <label for="name" class="sr-only">Name</label>
              <input
                type="text"
                name="name"
                id="name"
                :value="item.name"
                @input="updateName"
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
                placeholder="Name"
              />
            </div>
            <div class="mt-3">
              <label for="status" class="sr-only">Status</label>
              <select
                name="status"
                id="status"
                :value="item.name"
                @input="updateStatus"
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
                <option>Available</option>
                <option>Loading</option>
                <option>On Transit</option>
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
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      //
    };
  },
  created() {
    //
  },
  destroyed() {
    this.resetState();
  },
  computed: {
    ...mapGetters("FleetsSingle", ["item", "loading"]),
  },
  methods: {
    ...mapActions("FleetsSingle", [
      "storeData",
      "setName",
      "setStatus",
      "resetState",
    ]),
    updateName(e) {
      this.setName(e.target.value);
    },
    updateStatus(e) {
      this.setStatus(e.target.value);
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: "fleets.index" });
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>