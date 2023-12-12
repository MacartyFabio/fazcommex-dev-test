<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import DuesTable from "@/Components/DuesTable.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

</script>

<script>
export default {
    props: ['dues'],
}
</script>


<template>
    <Head title="DU-Es" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-end mt-4 mr-5">
                        <Link
                            :href="route('dues.import')"
                            class="text-xs font-medium text-white uppercase bg-gray-800 sm:rounded-lg p-2"
                        >
                            Importar Json
                        </Link>
                    </div>
                    <DuesTable :dues="dues.data"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
