<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";


defineProps({
    gigs: Object
})

const form = useForm({
    role: null,
    company: null,
    country: null,
    state: null,
    address: null,
    tags: null,
    min_salary: null,
    max_salary: null
});

const submit = () => {
    form.post(route('gigs.store'));
};
</script>

<template>
    <Head title="Gigs" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="border-b-2 pb-8 w-full">
                <h2 class=" leading-tight">
                    Gigs
                </h2>
            </div>
        </template>

        <section class="px-3 sm:px-12">
            <div class="pb-5">
                <p>New gig</p>
            </div>

<!--            Gigs form-->

            <div class="lg:flex lg:flex-row">
                <div class="w-48 mb-8 lg:mb-0">
                    <div class="bg-white p-4 pr-8 rounded-lg text-xs text-slate-400 shadow-lg">
                        <div class="px-5 py-2">Basic</div>
                        <div class="px-5 py-5 ">Renumeration</div>
                    </div>
                </div>

                <div class="lg:mx-7 w-[350px] sm:w-[548px] lg:w-[700px] md:w-[650px] w-full lg:mt-0 mt-8">
                    <div class="bg-white w-full py-10 px-5 sm:px-8 md:pl-10 md:pr-20 rounded-lg text-xs text-slate-400 shadow-sm">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 mb-8">
                                <div class="col-span-1">
                                    <Label class="text-xs text-slate-400">Role</Label>
                                    <Input id="role" type="text" class="mt-1 block w-full  text-slate-700"
                                           placeholder="Role" v-model="form.role"
                                            autofocus />
                                    <InputError class="mt-2" :message="form.errors.role" />
                                </div>

                                <div class="col-span-1 sm:ml-2">
                                    <Label class="text-xs text-slate-400">Company</Label>
                                    <Input id="company" type="text" class="mt-1 block w-full text-slate-700"
                                           placeholder="Company" v-model="form.company" autocomplete="company"
                                            />
                                    <InputError class="mt-2" :message="form.errors.company" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 mb-8">
                                <div class="col-span-2">
                                    <Label class="text-xs text-slate-400">Location</Label>
                                </div>

                                <div class="sm:col-span-1 col-span-2">
                                    <select id="country" v-model="form.country"
                                            @change="fetchStates()"
                                            class="border-gray-100 focus:border-primary-200 focus:ring-primary-100 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full text-slate-700"
                                    >
                                        <option :value="null" key="0" selected disabled>Country</option>
                                        <option v-for="country in countries" :key="country.id"
                                                :value="country.name">{{ country.name }}</option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.country" />
                                </div>

                                <div class="sm:col-span-1 col-span-2 sm:ml-3">
                                    <select id="country" v-model="form.state" placeholder="Hi"
                                            class="border-gray-100 focus:border-primary-200 focus:ring-primary-100 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full text-slate-700"
                                    >
                                        <option :value="null" disabled selected>State/Region</option>
                                        <option v-for="state in states" :key="state.id" :value="state.name">{{ state.name }}</option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.state" />
                                </div>

                                <div class="col-span-2">
                                    <Input id="address" type="text" class="mt-1 block w-full text-slate-700"
                                           placeholder="Address" v-model="form.address"
                                            />
                                    <InputError class="mt-2" :message="form.errors.address" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mb-2">
                                <div class="col-span-1">
                                    <Label class="text-xs text-slate-400">Add tags</Label>
                                    <Input id="tags" type="text" class="mt-1 block w-full text-slate-700"
                                           placeholder="Enter multiple tags by separating with comma"
                                           v-model="form.tags"
                                            />
                                    <span class="text-xs text-slate-400">Suggested tags: full time, contract, freelance</span>
                                    <InputError class="mt-2" :message="form.errors.tags" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 mb-8 mt-5">
                                <div class="col-span-2">
                                    <Label class="text-xs text-slate-400">Salary</Label>
                                </div>

                                <div class="col-span-1">
                                    <Input id="min_salary" type="text" class="mt-1 block w-full text-slate-700"
                                           placeholder="Minimum"
                                           autocomplete="min_salary" v-model="form.min_salary" />
                                    <InputError class="mt-2" :message="form.errors.min_salary" />
                                </div>

                                <div class="col-span-1 ml-3">
                                    <Input id="max_salary" type="text" class="mt-1 block w-full text-slate-700"
                                           placeholder="Maximum"
                                           autocomplete="max_salary" v-model="form.max_salary" />
                                    <InputError class="mt-2" :message="form.errors.max_salary" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-8">
                                <Button class="bg-transparent text-slate-500 active:bg-transparent focus:bg-transparent focus:border-transparent hover:bg-transparent hover:border-transparent" type="reset">
                                    Cancel
                                </Button>

                                <Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Add gig
                                </Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </BreezeAuthenticatedLayout>
</template>

<script>
export default {
    data() {
        return {
            countries: [],
            states: []
        }
    },

    created() {
        this.fetchCountries();
    },

    methods: {
        fetchCountries()
        {
            fetch(this.appUrl + '/api/countries' ).then(
                res => res.json()).then(
                data => {
                    this.countries = data;
                })
        },

        fetchStates() {

            fetch(this.appUrl + '/api/countries/' + this.form.country + '/states').then(
                res => res.json()).then(
                    data => {
                        this.states = data
                    })
        }
    }
}
</script>
