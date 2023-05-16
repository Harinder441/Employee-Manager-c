

<script setup>
import Employee from './Employee.vue';
defineProps(['employees']);
</script>

<template>
    <b-table striped hover :items="employees"></b-table>
    <div class="grid justify-items-center mt-6 bg-white shadow-sm rounded-lg">
        <table class="border-separate border border-slate-200  ">
            <caption class="caption-top">
                  Employees Data
            </caption>
            <thead class="bg-gray-200 ">
                <tr>
                    <th  class="border border-slate-300">
                        First Name
                    </th>
                    <th  class="border border-slate-300">
                        Last Name
                    </th>
                    <th  class="border border-slate-300">
                        Email
                    </th>
                    <th  class="border border-slate-300">
                        Department
                    </th>
                    <th  class="border border-slate-300">
                        Position
                    </th>
                    <th  class="border border-slate-300">
                        Date of Joining
                    </th>

                    <th  class="border border-slate-300">
                            Actions
                    </th>
                </tr>
            </thead>
             <tbody>
        
            <Employee v-for="employee in employees" :key="employee.id" :employee="employee" />
    
    </tbody>
    </table>
</div></template>
