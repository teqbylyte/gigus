<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

defineProps({
    gigs: Object
})
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
                        <form action="">
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 mb-8">
                                <div class="col-span-1">
                                    <Label class="text-xs text-slate-400">Role</Label>
                                    <Input id="role" type="text" class="mt-1 block w-full  text-slate-700"
                                           placeholder="Role"
                                           required autofocus autocomplete="role" />
                                </div>

                                <div class="col-span-1 ml-2">
                                    <Label class="text-xs text-slate-400">Company</Label>
                                    <Input id="company" type="text" class="mt-1 block w-full text-slate-700"
                                           placeholder="Company"
                                           required autocomplete="company" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 mb-8">
                                <div class="col-span-2">
                                    <Label class="text-xs text-slate-400">Location</Label>
                                </div>

                                <div class="col-span-1">
                                    <Input id="email" type="email" class="mt-1 block w-full  text-slate-700" required autocomplete="username" />
                                </div>

                                <div class="col-span-1 ml-3">
                                    <Input id="email" type="email" class="mt-1 block w-full text-slate-700"
                                           required autocomplete="username" />
                                </div>

                                <div class="col-span-2">
                                    <Input id="address" type="text" class="mt-1 block w-full text-slate-700"
                                           placeholder="Address"
                                           required autocomplete="address" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mb-2">
                                <div class="col-span-1">
                                    <Label class="text-xs text-slate-400">Add tags</Label>
                                    <Input id="email" type="email" class="mt-1 block w-full text-slate-700" required autocomplete="username" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">


                                <Button class="ml-4">
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
