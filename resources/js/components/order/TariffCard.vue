<template>
    <div class="card">
        <div class="card-header">
            {{ tariff.title }}
        </div>
        <div class="card-body">
            <div v-html="tariff.description"></div>
            <div class="row">
                <div class="col">
                    {{ tariff.period }}
                    {{ tariff.period_type.title }}
                </div>
                <div class="col">
                    {{ tariff.price }}
                </div>
            </div>
            <div class="">
                <button class="btn btn-primary" @click="showModal(group)">
                    Параметры
                </button>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            tariff: {
                required: true,
                type: Object,
                default: () => {
                    return {};
                }
            },
            group: {
                required: true,
                type: Object,
                default: () => {
                    return {};
                }
            },
            showModal: {
                required: true,
                type: Function,
                default: () => {
                    return;
                }
            }
        },
    }
</script>
