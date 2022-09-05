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
                        </NavLink>
                    </div>


                    <div class="w-full">
                        <NavLink href="#" id="my_gigs" :active="active_tab === 'other-gigs'" @click="filterGigs('other-gigs')">
                            <span class="pb-3 px-3 font-bold">My Gigs</span>
                        </NavLink>
                    </div>

                    <div class="w-full">
                        <NavLink href="#" id="rejected_gigs" :active="active_tab === 'rejected'" @click="filterGigs('rejected')">
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
                                    <span class="flex items-center">
                                        <span>Date</span>
                                        <span class="pl-1">
                                            <Icon class="text-xs font-bold text-primary-500">arrow_upward</Icon>
                                            <Icon class="text-xs font-bold text-primary-500">arrow_downward</Icon>
                                        </span>
                                    </span>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="flex items-center">
                                    <span>Salary($)</span>
                                    <span class="pl-1">
                                        <Icon class="text-xs font-bold text-primary-500">arrow_upward</Icon>
                                        <Icon class="text-xs font-bold  text-primary-500">arrow_downward</Icon>
                                    </span>
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-if="active_tab === 'other-gigs'" v-for="gig in otherGigs" class="bg-white border-y-8 border-gray-100  text-gray-700 rounded-[40px]">
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
                        <td class="py-4 px-6">
                            <Link :href="route('gigs.delete', gig.uuid)" method="delete" as="button">
                                <Button type="button" class="bg-primary-600 bg-opacity-10 hover:bg-primary-700 active:bg-primary-700 hover:bg-opacity-20 focus:border-0">
                                    <span class="text-primary-700 text-xs font-semibold px-2">Delete</span>
                                </Button>
                            </Link>
                        </td>
                    </tr>
                    <tr v-else-if="active_tab === 'rejected'" v-for="gig in rejectedGigs" class="bg-white border-y-8 border-gray-100  text-gray-700 rounded-[40px]">
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
                        <td class="py-4 px-6">
                            <Link :href="route('gigs.delete', gig.uuid)" method="delete" as="button">
                                <Button type="button" class="bg-primary-600 bg-opacity-10 hover:bg-primary-700 active:bg-primary-700 hover:bg-opacity-20 focus:border-0">
                                    <span class="text-primary-700 text-xs font-semibold px-2">Delete</span>
                                </Button>
                            </Link>
                        </td>
                    </tr>
                    <tr v-else v-for="gig in allGigs" class="bg-white border-y-8 border-gray-100  text-gray-700 rounded-[40px]">
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
                        <td class="py-4 px-6">
                            <Link :href="route('gigs.delete', gig.uuid)" method="delete" as="button">
                                <Button type="button" class="bg-primary-600 bg-opacity-10 hover:bg-primary-700 active:bg-primary-700 hover:bg-opacity-20 focus:border-0">
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

let current_tab = 'all';

export default {
    data() {
        return {
            page_gigs: this.allGigs,

            active_tab: current_tab,
        }
    },

    computed: {
        allGigs() {
            return this.gigs;
        },

        rejectedGigs() {
            return this.gigs.filter(g => g.status === 'rejected');
        },

        otherGigs() {
            return this.gigs.filter(g => g.status !== 'rejected');
        }
    },

    methods: {
        filterGigs(status = null)
        {
            switch (status) {
                case 'rejected':
                    current_tab = 'rejected';
                    break;

                case 'other-gigs':
                    current_tab = 'other-gigs'
                    break;

                default:
                    current_tab = 'all'
                    break;
            }
        }
    }
}
</script>

