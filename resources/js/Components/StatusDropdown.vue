<script setup>
import { computed } from 'vue';
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import Button from "@/Components/Button.vue";

const props = defineProps(['status', 'route']);

const classes = computed(() => props.status === 'pending'
    ? 'bg-purple-600 hover:bg-purple-700 active:bg-purple-700'
    : (props.status === 'active'
        ? 'bg-blue-600 hover:bg-blue-700 active:bg-blue-700'
        : (props.status === 'completed'
            ? 'bg-green-600 hover:bg-green-700 active:bg-green-700'
            : 'bg-red-600 hover:bg-red-700 active:bg-red-700'
            )
        )
);

const text_class = computed(() => props.status === 'pending'
    ? 'text-purple-700'
    : (props.status === 'active'
            ? 'text-blue-700'
            : (props.status === 'completed'
                    ? 'text-green-700'
                    : 'text-red-700'
            )
    )
);

const status_rejected = computed(() => props.status === 'rejected');
</script>

<template>
    <Dropdown align="right" width="48">
        <template #trigger>
            <span class="inline-flex rounded-md">
                <Button type="button" class="bg-opacity-10 rounded-[5px] py-1 hover:bg-opacity-20 focus:border-0" :class="classes">
                        <span class="text-xs font-semibold" :class="text_class">{{ status.toString().replace(/^./, status.toString()[0].toUpperCase())}}</span>

                        <span :class="text_class" v-if="!status_rejected">
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                </Button>
            </span>
        </template>

        <template #content v-if="!status_rejected">
            <DropdownLink v-if="status !== 'pending'" :href="route"
                          :data="{'status': 'pending'}" method="put" as="button"
            >
                Pending
            </DropdownLink>
            <DropdownLink v-if="status !== 'active'" :href="route"
                          :data="{'status': 'active'}" method="put" as="button"
            >
                Active
            </DropdownLink>
            <DropdownLink v-if="status !== 'completed'" :href="route"
                          :data="{'status': 'completed'}" method="put" as="button">
                Completed
            </DropdownLink>
            <DropdownLink v-if="status !== 'rejected'" :href="route"
                          :data="{'status': 'rejected'}" method="put" as="button">
                Rejected
            </DropdownLink>
        </template>
    </Dropdown>
</template>
