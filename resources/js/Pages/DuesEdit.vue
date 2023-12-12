<template>
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 mb-6">
            <form @submit.prevent="router.patch(`/dues/update/${dues.data.id}`,form);">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4 mt-4">Dados Gerais</h2>
                    <div class="grid grid-cols-2 gap-4 p-4">
                        <div>
                            <label class="font-semibold mr-2">Declarante</label>
                            <span>{{ `${dues.data.declarante_cpf_cnpj} - ${dues.data.declarante_razao_social}` }}</span>
                        </div>
                        <div>
                            <label class="font-semibold mr-2">Identificação</label>
                            <span>{{ dues.data.identificacao }}</span>
                        </div>
                        <div>
                            <label class="font-semibold mr-2">Número</label>
                            <span>{{ dues.data.numero }}</span>
                        </div>
                        <div>
                            <label class="font-semibold mr-2">Moeda</label>
                            <span>{{ dues.data.moeda }}</span>
                        </div>
                        <div>
                            <label class="font-semibold mr-2">VMCV Moeda</label>
                            <span>{{ this.formatNumber(dues.data.total_vmcv_moeda) }}</span>
                        </div>
                        <div>
                            <label class="font-semibold mr-2">VMLE Moeda</label>
                            <span>{{ this.formatNumber(dues.data.total_vmle_moeda) }}</span>
                        </div>
                        <div>
                            <label class="font-semibold mr-2">Peso Líquido</label>
                            <span>{{ this.formatWeight(dues.data.total_peso_liquido) }}</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4 mt-4">Informações
                        Complementares</h2>

                    <div>
                        <label class="font-semibold ml-4 mr-2">Informação Complementar Atual</label>
                        <span>{{ dues.data.informacoes_complementares }}</span>
                    </div>
                    <textarea
                        v-model="form.informacoes_complementares"
                        rows="4"
                        class="shadow-sm block w-3/4 ml-4 mt-4 mb-4 sm:text-sm rounded-md"
                        placeholder="Altere informações complementares aqui..."
                    ></textarea>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 mt-4">
                    <div class="container mx-auto mt-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4">Itens</h2>
                        <table class="min-w-full divide-y">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Item
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nota/Série/Item
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descrição Complementar
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    NCM
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Enquadramentos
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    VMLE Moeda
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    VMCV Moeda
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Peso Líquido
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y">
                            <tr v-for="(item, index) in dues.data.itens.data" :key="index">
                                <td class="px-6 py-4">{{ item.item }}</td>
                                <td class="px-6 py-4">{{ `${item.nfe_numero}/${item.nfe_serie}/${item.nfe_item}` }}</td>
                                <td class="px-6 py-4">{{ item.descricao_complementar }}</td>
                                <td class="px-6 py-4">{{ item.ncm }}</td>
                                <td class="px-6 py-4">{{
                                        this.formatEnquadramentos(item.enquadramento1, item.enquadramento2, item.enquadramento3, item.enquadramento4)
                                    }}
                                </td>
                                <td class="px-6 py-4">{{ this.formatNumber(item.vmle_moeda) }}</td>
                                <td class="px-6 py-4">{{ this.formatNumber(item.vmcv_moeda) }}</td>
                                <td class="px-6 py-4">{{ this.formatWeight(item.peso_liquido) }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="flex items-center justify-end mt-4 mr-5">
                    <PrimaryButton class="text-sm font-medium text-white uppercase bg-gray-800 sm:rounded-lg p-2 mb-6"
                    >Salvar
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import {router, useForm} from "@inertiajs/vue3";

const form = useForm({
    informacoes_complementares: ""
});

</script>

<script>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    components: {PrimaryButton, AuthenticatedLayout},

    props: {
        dues: Object,
    },
    methods: {
        formatEnquadramentos(enquadramento1, enquadramento2, enquadramento3, enquadramento4) {
            const enquadramentos = [enquadramento1, enquadramento2, enquadramento3, enquadramento4];
            return enquadramentos
                .filter(item => item !== null && item !== '')
                .join(', ');
        },
        formatNumber(number) {
            return new Intl.NumberFormat('pt-BR', {style: 'decimal'}).format(number);
        },
        formatWeight(value) {
            return new Intl.NumberFormat('pt-BR', {minimumFractionDigits: 5, maximumFractionDigits: 5}).format(value);
        }
    }
};
</script>
