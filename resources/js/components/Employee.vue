<script setup>
import '@fortawesome/fontawesome-free/css/all.css';
import PrimaryButton from './PrimaryButton.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


const props=defineProps(['employee']);
const editing = ref(false);

const form = useForm({
    firstName:props.employee.firstName,
    lastName:props.employee.lastName,
  email:props.employee.email,
  department:props.employee.department,
  position:props.employee.position,
  dateOfJoining:props.employee.dateOfJoining,
});

function deleteEmployee(employeeId) {
  if (confirm('Are you sure you want to delete this employee?')) {
    this.$inertia.delete(route('employees.destroy', employeeId));
  }
}
</script>
<template>
    
  <tr v-if="editing">
    <td colspan="7">
      <form class="flex"  @submit.prevent="form.put(route('employees.update', employee.id), { onSuccess: () => editing = false })">
        
        <div class="form-group">
          <input v-model="form.firstName" type="text" id="firstName" class="form-control ">
        </div>
        <div class="form-group">
          <input v-model="form.lastName" type="text" id="lastName" class="form-control">
        </div>
        <div class="form-group">
          <input v-model="form.email" type="email" id="email" class="form-control">
        </div>
        <div class="form-group">
  
          <input v-model="form.department" type="text" id="department" class="form-control">
        </div>
        <div class="form-group">

          <input v-model="form.position" type="text" id="position" class="form-control">
        </div>
        <div class="form-group">
          <input v-model="form.dateOfJoining" type="date" id="dateOfJoining" class="form-control">
        </div>
        <div class="form-group">
          <PrimaryButton type="submit" class="btn btn-primary">Update</PrimaryButton>
          <PrimaryButton @click="editing = false; form.reset();" class="btn btn-secondary">Cancel</PrimaryButton>
        </div>
      </form>
    </td>
  </tr>
  <tr v-else>
      <td class="border border-slate-100">{{ props.employee.firstName }}</td>
      <td class="border border-slate-100">{{ props.employee.lastName }}</td>
      <td class="border border-slate-100">{{ props.employee.email }}</td>
      <td class="border border-slate-100">{{ props.employee.department }}</td>
      <td class="border border-slate-100">{{ props.employee.position }}</td>
      <td class="border border-slate-100">{{ new Date(props.employee.dateOfJoining).toLocaleDateString() }}</td>
  
      <td class="border border-slate-100"><div class="employee-actions">
      <PrimaryButton class="mx-1"  @click="editing = true" ><i class="fas fa-edit"></i></PrimaryButton>
      <Link :href="route('employees.destroy', employee.id)" method="delete"><PrimaryButton class="mx-1"><i class="fas fa-trash" ></i></PrimaryButton></Link>
    </div></td>
  </tr>
    

  </template>
  <style>
.form-control{
  width:100px;
}
</style>