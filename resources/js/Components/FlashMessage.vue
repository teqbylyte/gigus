<template>
    <div v-show="flashVisible" class="text-center fixed left-1/2 -translate-x-1/2 top-2 w-96">
        <div id="toast-default" v-if="flash.message" class="flex items-center p-4 w-full max-w-xs text-gray-600 bg-primary-50 rounded-lg shadow" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-primary-500 bg-primary-100 rounded-lg">
                <Icon>info</Icon>
                <span class="sr-only">Info icon</span>
            </div>

            <div class="ml-3 text-sm font-normal">{{ flash.message }}</div>

            <button type="button" @click="stopFlash" class="ml-auto -mx-1.5 -my-1.5 bg-primary-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-primary-200/80 inline-flex h-8 w-8" data-dismiss-target="#toast-default" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

        <div id="toast-success" v-if="flash.success" class="flex items-center p-4 w-full max-w-xs text-gray-600 bg-green-100 rounded-lg shadow" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-600 bg-green-100 rounded-lg">
                <Icon>info</Icon>
                <span class="sr-only">Info icon</span>
            </div>

            <div class="ml-3 text-sm font-normal">{{ flash.success }}</div>

            <button type="button" @click="stopFlash" class="ml-auto -mx-1.5 -my-1.5 bg-red-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-green-200/80 inline-flex h-8 w-8" data-dismiss-target="#toast-default" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

        <div id="toast-error" v-if="flash.error" class="flex items-center p-4 w-full max-w-xs text-gray-600 bg-red-100 rounded-lg shadow" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-600 bg-green-100 rounded-lg">
                <Icon>info</Icon>
                <span class="sr-only">Info icon</span>
            </div>

            <div class="ml-3 text-sm font-normal">{{ flash.error }}</div>

            <button type="button" @click="stopFlash" class="ml-auto -mx-1.5 -my-1.5 bg-red-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-red-200/80 inline-flex h-8 w-8" data-dismiss-target="#toast-default" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "FlashMessage",
    data() {
        return {
            flashVisible: true
        }
    },
    methods: {
        stopFlash() {
            this.flashVisible = false;
        },
    },

    mounted() {
        setTimeout(() => this.flashVisible = false, 7000)
    }
}


</script>
