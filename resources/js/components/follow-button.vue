<template>
  <div>
    <div class="d-flex">
      <button
        class="btn btn-primary"
        @click="followUser"
        v-text="buttonText"
      ></button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userid", "follows"],
  mounted() {
    console.log("Component mounted.");
  },
  data: function () {
    return {
      status: this.follows,
    };
  },
  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userid)
        .then((response) => {
          this.status = !this.status;
          console.log(response.data);
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    },
  },
  computed: {
    buttonText() {
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>
