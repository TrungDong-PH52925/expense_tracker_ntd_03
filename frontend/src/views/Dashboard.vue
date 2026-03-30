<script setup>
import { ref, onMounted } from 'vue';
import api from '../api/axios';

const dashboard = ref({});
const categories = ref([]);
const amount = ref("");
const category_id = ref("");

const loadCategories = async () => {
    const res = await api.get("/categories");
    categories.value = res.data;
}
const loadDashboard = async () => {
    const res = await api.get("/dashboard");
    dashboard.value = res.data;
}

const error = ref("");

const addExpense = async () => {
  error.value = "";

  try {
    await api.post("/expenses", {
      amount: amount.value,
      category_id: category_id.value,
      spent_at: new Date().toISOString().slice(0, 10),
    });

    amount.value = "";
    loadDashboard();

  } catch (err) {
    if (err.response?.data?.errors) {
      error.value = Object.values(err.response.data.errors)[0][0];
    } else {
      error.value = "Something went wrong";
    }
  }
};
onMounted(() =>{
    loadCategories();
    loadDashboard();
});
</script>

<template>
    <h1>Test words in process</h1>
    <div class="max-w-xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <!-- Category -->
         <select v-model="category_id" id="" class="border p-2">
            <option disabled value="">Select category</option>
            <option v-for="c in categories"
                :key="c.id"
                :value="c.id">{{ c.name }}
            </option>
         </select>
        <!-- Summary -->
         <div class="p-4 border rounded mb-4">
            <p>Total: {{ dashboard.total }}</p>
            <p>Budget: {{ dashboard.budget }}</p>
            <p>Remaining: {{ dashboard.remaining }}</p>

            <p v-if="dashboard.warning" class="text-red-500 front-bold">Vượt quá ngân sách</p>
         </div>

         <!-- Add Expense -->
          <div class="flex gap-2 mb-4">
            <input v-model="amount" placeholder="Amount" class="border p-2 flex-1" type="text"/>
            <button :disabled="!amount"
             @click="addExpense"
              class="bg-green-500 text-white px-4">
                Add
            </button>
          </div>
    </div>
</template>
