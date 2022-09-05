<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import vueCountryRegionSelect from 'vue-country-region-select'


defineProps({
    gigs: Object
})

const form = useForm({
    // role: null,
    // company: null,
    // country: null,
    // state: null,
    // address: null,
    // tags: null,
    // min_salary: null,
    // max_salary: null

    role: 'Product Design',
    company: 'Teqpace',
    country: 'Nigeria',
    state: 'Lagos',
    address: '9 Akinlawanson',
    tags: 'freelance, health',
    min_salary: '90000',
    max_salary: '1000000'
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

        <section class="px-12">
            <div class="pb-5">
                <p>New gig</p>
            </div>

<!--            Gigs form-->

            <div class="flex flex-col md:flex-row">
                <div>
                    <div class="bg-white p-4 pr-8 rounded-lg text-xs text-slate-400 shadow-md">
                        <div class="px-5 py-2">Basic</div>
                        <div class="px-5 py-5 ">Renumeration</div>
                    </div>
                </div>

                <div class="mx-7 w-6/12 lg:w-7/12 md:w-9/12 w-full">
                    <div class="bg-white w-full py-10 pl-10 pr-20 rounded-lg text-xs text-slate-400 shadow-sm">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 mb-8">
                                <div class="col-span-1">
                                    <Label class="text-xs text-slate-400">Role</Label>
                                    <Input id="role" type="text" class="mt-1 block w-full  text-slate-700"
                                           placeholder="Role" v-model="form.role"
                                            autofocus />
                                    <InputError class="mt-2" :message="form.errors.role" />
                                </div>

                                <div class="col-span-1 ml-2">
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

                                <div class="col-span-1">
                                    <Input id="country" type="text" class="mt-1 block w-full text-slate-700"
                                            autocomplete="state" v-model="form.country" />
                                    <InputError class="mt-2" :message="form.errors.country" />
                                </div>

                                <div class="col-span-1 ml-3">
                                    <Input id="state" type="text" class="mt-1 block w-full text-slate-700"
                                            autocomplete="state" v-model="form.state" />
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
                                           v-model="form.tags"
                                            />
                                    <InputError class="mt-2" :message="form.errors.tags" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 mb-8">
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
