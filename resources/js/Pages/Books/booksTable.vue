<script setup>
    import axios from 'axios';
    import { onMounted, reactive } from 'vue';

    const state = reactive({
        Books: [],
    });

    onMounted(async () => {
        await getBooks();
    });
    
    async function getBooks(){

        const response = await axios.post('getBooks');
        state.Books = response.data.data;
        console.log(state.Books);
    }

</script>

<template>
    {{ state.Books.data }}
    <table class="table table-bordered table-fixed w-full posts-table">
        <thead>
            <tr class="bg-gray-100">
                <th>#</th>
                <th>title</th>
                <th>author</th>
                <th>image</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="book in state.Books">
                <td class="px-4 py-2 border">{{ book.id }}</td>
                <td class="px-4 py-2 border">{{ book.title }}</td>
                <td class="px-4 py-2 border">{{ book.author }}</td>
                <td class="px-4 py-2 border">{{ book.image }}</td>
                <td class="px-4 py-2 border">action</td>
            </tr>
        </tbody>
    </table>
</template>