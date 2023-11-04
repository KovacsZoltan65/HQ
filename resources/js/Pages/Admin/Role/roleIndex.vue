<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';

    import DataTable from 'datatables.net-vue3';
    import DataTablesCore from 'datatables.net';
    
    DataTable.use(DataTablesCore);
    
    const columns = [
        { data: 'name', title: 'Name' },
        { data: 'position', title: 'Position' },
        { data: 'office', title: 'Office' },
        { data: 'extn', title: 'Extension' },
        { data: 'start_date', title: 'Start date' },
        { data: 'salary', title: 'Salary' },
    ];

    const data = [
        {name: 'Name 01', position: 'Position 01', office: 'Office 01', extn: 'Extn 01', start_date: '2023-01-01', salary: 'Salary 01',},
        {name: 'Name 02', position: 'Position 02', office: 'Office 02', extn: 'Extn 02', start_date: '2023-01-01', salary: 'Salary 02',},
        {name: 'Name 03', position: 'Position 03', office: 'Office 03', extn: 'Extn 03', start_date: '2023-01-01', salary: 'Salary 03',},
    ];

    const options = {
        responsive: true,
        select: true,
    };

</script>

<template>
    <AppLayout :title="roles">
        
        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('roles') }}
            </h2>
        </template>

        <div class="py-6" style="padding-bottom: 0px;">

            <div class="mx-auto sm:px-6 lg:px-8 mb-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <DataTable
                        :options="options" 
                        :columns="columns"
                        :data="data" 
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400" />

                </div>
            </div>

        </div>

    </AppLayout>
</template>