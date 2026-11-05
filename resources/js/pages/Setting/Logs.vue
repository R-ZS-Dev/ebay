<script setup lang="ts">
    import AppLayout from "../../components/AppLayout.vue";
    import DownloadIcon from "../../components/icons/DownloadIcon.vue";

    const LogsTableRecords = [
        {
            id: 1,
            dateTime: "20-10-2026 12:04:02",
            logStatus: "info",
            logTitle: "All Updated Successfully",
        },
        {
            id: 2,
            dateTime: "20-10-2026 05:10:40",
            logStatus: "warning",
            logTitle: "Please check your network connection",
        },
        {
            id: 2,
            dateTime: "20-10-2026 09:45:33",
            logStatus: "error",
            logTitle: "http://localhost:8000/api/warehouse/1 not found",
        },
    ];
</script>

<template>
    <AppLayout>
        <h2 class="text-3xl font-semibold text-gray-800"> Logs Record </h2>
        <div class="grid grid-cols-10 gap-2 mt-2">
            <!-- Search: 4 columns -->
            <div class="col-span-4">
                <input class="input-style w-full"
                    type="text" name=""
                    placeholder="Search record..."
                />
            </div>

            <!-- Type: 4 columns -->
            <div class="col-span-3">
                <select class="select-option w-full" name="" id="">
                    <option value="">Type</option>
                    <option value="Error">Error</option>
                    <option value="Warning">Warning</option>
                    <option value="Info">Info</option>
                </select>
            </div>

            <!-- Apply: 2 columns -->
            <div class="col-span-1 p-1">
                <button class="common-button w-full h-10">Apply</button>
            </div>

            <!-- Reset: 2 columns -->
            <div class="col-span-1 p-1">
                <button class="common-button w-full h-10">Reset</button>
            </div>

            <div class="col-span-1 p-1">
                <button class="common-button justify-center w-full h-10 flex gap-2"> <DownloadIcon /> Export</button>
            </div>
        </div>

        <!-- Record Table -->
        <div class="grid grid-cols-1 bg-white p-6 rounded-lg shadow mt-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="table-th">Log at</th>
                            <th class="table-th">Level</th>
                            <th class="table-th">Message</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr
                            v-for="LogsTableRecord in LogsTableRecords"
                            :key="LogsTableRecord.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="table-td"> {{ LogsTableRecord.dateTime }} </td>
                            <td class="table-td">
                                <span
                                    class="px-2 py-1 rounded text-xs font-semibold"
                                    :class="{
                                        'bg-blue-500 text-white': LogsTableRecord.logStatus === 'info',
                                        'bg-yellow-100 text-yellow-800': LogsTableRecord.logStatus === 'warning',
                                        'bg-red-100 text-red-700': LogsTableRecord.logStatus === 'error'
                                    }"
                                >
                                    {{ LogsTableRecord.logStatus }}
                                </span>
                            </td>
                            <td class="table-td"> {{ LogsTableRecord.logTitle }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
