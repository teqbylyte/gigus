<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from "@/Components/Button.vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({
    gigs: Object
})

</script>

<template>
    <Head title="Gigs" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class=" leading-tight">
                Gigs
            </h2>

            <Link :href="route('gigs.create')">
                <Button type="button">
                    <div class="flex justify-between w-20">
                        <span aria-label="New gig">New gig</span>
                        <span class="font-bold"> + </span>
                    </div>
                </Button>
            </Link>
        </template>

        <section class="py-6">
            <!--            Gigs selection tab-->
            <div class="pb-10">
                <div class="w-full flex justify-around sm:-my-px sm:flex border-b">
                    <div class="w-full">
                        <NavLink href="#" id="all_gigs" :active="active_tab === 'all'" @click="filterGigs">
                            <span class="pb-3 px-3 font-bold">All Gigs</span>
                            <span class="mb-3 px-4 text-[10px] font-semibold rounded-md text-white" :class="active_tab === 'all' ? 'bg-primary-500' : 'bg-primary-600 bg-opacity-10 text-primary-600'">{{ allGigs.length }}</span>
                        </NavLink>
                    </div>


                    <div class="w-full">
                        <NavLink href="#" id="my_gigs" :active="active_tab === 'other-gigs'" @click="filterGigs('other-gigs')">
                            <span class="pb-3 px-3 font-bold">My Gigs</span>
                            <span class="mb-3 px-4 text-[10px] font-semibold rounded-md text-white" :class="active_tab === 'other-gigs' ? 'bg-primary-500' : 'bg-primary-600 bg-opacity-10 text-primary-600'">{{ otherGigs.length }}</span>
                        </NavLink>
                    </div>

                    <div class="w-full">
                        <NavLink href="#" id="rejected_gigs" :active="active_tab === 'rejected'" @click="filterGigs('rejected')">
                            <span class="pb-3 px-3 font-bold">Rejected Gigs</span>
                            <span class="mb-3 px-4 text-[10px] font-semibold rounded-md text-white" :class="active_tab === 'rejected' ? 'bg-primary-500' : 'bg-primary-600 bg-opacity-10 text-primary-600'">{{ rejectedGigs.length }}</span>
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
                            <span class="flex items-center">
                                <span>Date</span>
                                <span class="pl-1" @click="sortDate">
                                    <Icon class="text-xs font-bold text-primary-500">arrow_upward</Icon>
                                    <Icon class="text-xs font-bold text-primary-500">arrow_downward</Icon>
                                </span>
                            </span>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="flex items-center">
                                <span>Salary($)</span>
                                <span class="pl-1" @click="sortSalary">
                                    <Icon class="text-xs font-bold text-primary-500">arrow_upward</Icon>
                                    <Icon class="text-xs font-bold  text-primary-500">arrow_downward</Icon>
                                </span>
                            </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="gigs.length > 0" class="bg-white border-y-8 border-gray-100  text-gray-700 rounded-[40px]"
                        v-for="gig in active_tab === 'rejected' ? rejectedGigs : ( active_tab === 'other-gigs' ? otherGigs : allGigs)"
                    >
                        <th scope="row" class="py-2 px-6 font-medium whitespace-nowrap ">
                            {{ gig.role.name }}
                        </th>
                        <td class="py-2 px-6">
                            {{ gig.company.name  }}
                        </td>
                        <td class="py-2 px-6">
                            {{  formatDate(gig.created_at, false, 'Do MMMM, YYYY') }}
                        </td>
                        <td class="py-2 px-6">
                            {{ formatMoney(gig.min_salary) }} - {{ formatMoney(gig.max_salary) }}
                        </td>
                        <td class="py-2">
                            <Link :href="route('gigs.delete', gig.uuid)" method="delete" as="button">
                                <Button type="button" class="bg-primary-600 bg-opacity-10 rounded-[5px] py-1 hover:bg-primary-700 active:bg-primary-700 hover:bg-opacity-20 focus:border-0">
                                    <span class="text-primary-700 text-xs font-semibold px-2">Delete</span>
                                </Button>
                            </Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </BreezeAuthenticatedLayout>
</template>

<script>

import {usePage} from "@inertiajs/inertia-vue3";

let active_tab = 'all';
let date_sorted = true;
let salary_sorted = false;

export default {
    data() {
        return {
            active_tab,
            date_sorted,
            allGigs: this.gigs,
            rejectedGigs: this.gigs.filter(g => g.status === 'rejected'),
            otherGigs: this.gigs.filter(g => g.status !== 'rejected'),
        }
    },

    methods: {
        filterGigs(status = null)
        {
            switch (status) {
                case 'rejected':
                    active_tab = 'rejected';
                    break;

                case 'other-gigs':
                    active_tab = 'other-gigs'
                    break;

                default:
                    active_tab = 'all'
                    break;
            }
        },

        sortDate()
        {
            date_sorted = !date_sorted;

            this.allGigs = this.dateSorting(this.allGigs, date_sorted);
            this.otherGigs = this.dateSorting(this.otherGigs, date_sorted);
            this.rejectedGigs = this.dateSorting(this.rejectedGigs, date_sorted);
        },

        sortSalary()
        {
            salary_sorted = !salary_sorted

            this.allGigs = this.salarySorting(this.allGigs, salary_sorted);
            this.otherGigs = this.salarySorting(this.otherGigs, salary_sorted);
            this.rejectedGigs = this.salarySorting(this.rejectedGigs, salary_sorted);
        }
    }
}
</script>


