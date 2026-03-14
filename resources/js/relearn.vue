<script setup>
import { ref} from 'vue';
const text = ref();
</script>

<template>
<h1>Just Do This Project To Learn And Show Vue Skills</h1>
<input type="text" v-model="text" placeholder="Type something in here...">
 <p>{{ text }}</p>
</template>

<style scoped>
</style>