<script setup>
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
    Filler
} from "chart.js";

import { Line } from "vue-chartjs";
import { ref, computed } from "vue";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
    Filler
);

const view = ref("monthly");

const monthlyData = {
    labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec"
    ],

    datasets: [
        {
            label: "Revenue",
            data: [
                12000,
                15000,
                18000,
                14000,
                22000,
                25000,
                21000,
                28000,
                30000,
                27000,
                32000,
                35000
            ],
            borderWidth: 2,
            tension: 0.4,
            fill: true
        }
    ]
};

const weeklyData = {
    labels: [
        "Week 1",
        "Week 2",
        "Week 3",
        "Week 4"
    ],

    datasets: [
        {
            label: "Revenue",
            data: [
                6500,
                8200,
                7100,
                9500
            ],
            borderWidth: 2,
            tension: 0.4,
            fill: true
        }
    ]
};

const chartData = computed(() => {
    return view.value === "monthly"
        ? monthlyData
        : weeklyData;
});

const chartOptions = {
    responsive: true,

    maintainAspectRatio: false,

    plugins: {
        legend: {
            display: true
        }
    },

    scales: {
        y: {
            beginAtZero: true
        }
    }
};
</script>

<template>

    <div>

        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">

            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Revenue
                </h2>

                <p class="text-sm text-gray-500">
                    Revenue overview
                </p>
            </div>


            <!-- Toggle -->
            <div class="flex rounded-lg bg-gray-100 p-1">

                <button
                    type="button"
                    @click="view = 'monthly'"
                    class="rounded-md px-4 py-2 text-sm font-medium"
                    :class="
                        view === 'monthly'
                            ? 'bg-white text-gray-800 shadow'
                            : 'text-gray-500'
                    "
                >
                    Monthly
                </button>


                <button
                    type="button"
                    @click="view = 'weekly'"
                    class="rounded-md px-4 py-2 text-sm font-medium"
                    :class="
                        view === 'weekly'
                            ? 'bg-white text-gray-800 shadow'
                            : 'text-gray-500'
                    "
                >
                    Weekly
                </button>

            </div>

        </div>


        <!-- Graph -->
        <div class="h-80">

            <Line
                :data="chartData"
                :options="chartOptions"
            />

        </div>

    </div>

</template>