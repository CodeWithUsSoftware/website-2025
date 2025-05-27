<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <!-- Global notification live region, render this permanently at the end of the document -->
    <transition name="slide-fade">
        <div v-if="notification.message"  aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-50">
            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                <!-- Notification panel, dynamically insert this into the live region when it needs to be displayed -->
                <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <CheckCircleIcon v-if="notification.success" class="h-6 w-6 text-success" aria-hidden="true" />
                                    <XCircleIcon v-else class="h-6 w-6 text-danger" aria-hidden="true" />
                                </div>
                                <div class="ml-3 w-0 flex-1 ">
                                    <p class="text-sm text-gray-500 capitalize">{{notification.message}}</p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button type="button" @click="this.notification.setMessage('')" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <XIcon class="h-5 w-5" aria-hidden="true" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </transition>
</template>

<script>
import { useNotificationStore } from "../store/notificationStore";

export default {
    setup(){
        const notification = useNotificationStore()

        return {
            notification
        }
    },
    created() {

    }
}
</script>
