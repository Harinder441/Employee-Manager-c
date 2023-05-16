<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import EmployeeTable from '@/Components/EmployeeTable.vue';
import { useForm, Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps(['employees']);
const viewForm = ref(false);
const form = useForm({
  firstName: '',
  lastName: '',
  email: '',
  department: '',
  position: '',
  dateOfJoining: '',
});
</script>

<template>
  <Head title="Add Employee" />

  <AuthenticatedLayout>
    <div class="Employee-container mx-10">
      <EmployeeTable :employees ='employees' />
    </div>

    <div v-if="viewForm" class=" max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <form @submit.prevent="form.post(route('employees.store'), { onSuccess: () => {form.reset();viewForm=false } })">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">First Name</label>
            <input v-model="form.firstName" type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            <InputError :message="form.errors.firstName" class="mt-2" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Last Name</label>
            <input v-model="form.lastName" type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            <InputError :message="form.errors.lastName" class="mt-2" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input v-model="form.email" type="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            <InputError :message="form.errors.email" class="mt-2" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Department</label>
            <input v-model="form.department" type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            <InputError :message="form.errors.department" class="mt-2" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Position</label>
            <input v-model="form.position" type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            <InputError :message="form.errors.position" class="mt-2" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Date of Joining</label>
            <input v-model="form.dateOfJoining" type="date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            <InputError :message="form.errors.dateOfJoining" class="mt-2" />
          </div>
        </div>
        <PrimaryButton class="mt-4 mx-1">Add Employee</PrimaryButton>
        <PrimaryButton class="mt-4 mx-1" @click="viewForm=false,form.reset()">Cancel</PrimaryButton>
      </form>
    </div>
    
    
    <div v-else class="grid justify-items-end add-employee">
      <PrimaryButton class="mt-4" @click="viewForm=true">Add Employee</PrimaryButton>
    </div>
    
  </AuthenticatedLayout>
</template>
