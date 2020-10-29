<template>
  <div>
    <div class="d-flex">
      <button class="btn btn-primary" @click="followUser">follow</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userid"],
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    followUser() {
      axios.post("/follow/" + this.userid).then((response) => {
        alert(response.data);
      });
    },
  },
};
</script>
