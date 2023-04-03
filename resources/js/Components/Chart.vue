<script setup>
import { Chart } from "chart.js/auto";
import { onMounted, ref, watch } from "vue";
const chartEl = ref(null);
const chart = ref(null);
const props = defineProps({
    chartData: {
        type: Object,
        required: true,
    },
    chartType: {
        type: String,
        required: true,
    },
    chartOptions: {
        type: Object,
        default: () => ({}),
    },
});

onMounted(() => renderChart());
const renderChart = () => {
    const ctx = chartEl.value.getContext("2d");
    chart.value = new Chart(ctx, {
        type: props.chartType,
        data: props.chartData,
        options: props.chartOptions,
    });
};
// watch(
//     () => props.chartData,
//     (newValue, oldValue) => {
//         chart.value.data = newValue;
//         chart.value.update();
//         console.log("chart...............");
//     },
//     { deep: true }
// );
</script>

<template>
    <div class="rounded-lg bg-white p-4 shadow-lg">
        <canvas ref="chartEl" class="h-[400px] w-full"></canvas>
    </div>
</template>
