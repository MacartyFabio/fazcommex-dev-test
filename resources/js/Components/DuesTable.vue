<template>
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Declarante
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Identificação
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moeda
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">VMCV
                        Moeda
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">VMLE
                        Moeda
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso
                        Líquido
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ação</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
                <tr v-for="(due, index) in dues" :key="index">
                    <td class="px-6 py-4">{{ due.declarante_cpf_cnpj }}</td>
                    <td class="px-6 py-4">{{ due.identificacao }}</td>
                    <td class="px-6 py-4">{{ due.numero }}</td>
                    <td class="px-6 py-4">{{ formatNumber(due.moeda) }}</td>
                    <td class="px-6 py-4">{{ formatNumber(due.total_vmcv_moeda) }}</td>
                    <td class="px-6 py-4">{{ formatNumber(due.total_vmle_moeda) }}</td>
                    <td class="px-6 py-4">{{ formatWeight(due.total_peso_liquido) }}</td>
                    <td class="px-6 py-4">
                        <Link
                            :href="`/dues/edit/${due.id}`"
                            class="text-xs font-medium text-white uppercase bg-gray-800 sm:rounded-lg p-2"
                        >
                            Editar
                        </Link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    components: {Link},
    props: {
        dues: Array
    },
    methods: {
        formatNumber(number) {
            return new Intl.NumberFormat('pt-BR', {style: 'decimal'}).format(number);
        },
        formatWeight(value) {
            return new Intl.NumberFormat('pt-BR', {minimumFractionDigits: 5, maximumFractionDigits: 5}).format(value);
        }
    }
};
</script>
