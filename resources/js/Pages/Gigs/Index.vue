<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from "@/Components/Button.vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({
    gigs: Object
})
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class=" leading-tight">
                Gigs
            </h2>

            <Button><span aria-label="New gig">N<span class="lowercase">ew gig</span></span></Button>
        </template>

        <section>

<!--            Gigs selection tab-->
            <div class="pb-10">
                <div class="w-full flex justify-around sm:-my-px sm:flex border-b">
                    <div class="w-full">
                        <NavLink href="#" :active="true">
                            <span class="pb-3 px-3 font-bold">All Gigs</span>
                        </NavLink>
                    </div>


                    <div class="w-full">
                        <NavLink href="#" :active="false">
                            <span class="pb-3 px-3 font-bold">My Gigs</span>
                        </NavLink>
                    </div>
                    <div class="w-full">
                        <NavLink href="#" :active="false">
                            <span class="pb-3 px-3 font-bold">Rejected Gigs</span>
                        </NavLink>
                    </div>
                </div>

            </div>

<!--            Gigs table-->
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs bg-transparent">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Role
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Company
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Date
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Salary($)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="gigs.length > 0" v-for="gig in gigs" class="bg-white border-y-8 border-gray-100  text-gray-700 rounded-[40px]">
                            <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap ">
                                {{ gig.role.name }}
                            </th>
                            <td class="py-4 px-6">
                                {{ gig.company.name  }}
                            </td>
                            <td class="py-4 px-6">
                                {{  formatDate(gig.created_at, false, 'Do MMMM, YYYY') }}
                            </td>
                            <td class="py-4 px-6">
                                {{ formatMoney(gig.min_salary) }} - {{ formatMoney(gig.max_salary) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </BreezeAuthenticatedLayout>
</template>
