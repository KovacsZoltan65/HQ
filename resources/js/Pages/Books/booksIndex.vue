<template>
    <app-layout>

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Books List
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <button @click="openForm()" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3"
                    >Create New Book</button>

                    <!-- table -->
                    <BooksTable></BooksTable>
                    
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script setup>
    import {reactive, onMounted, watch, computed} from 'vue';
    import AppLayout from '../../Layouts/AppLayout.vue';
    import Pagination from '../../Components/Pagination.vue';
    import BookForm from '../../Components/Book/form.vue'
    import BooksTable from './booksTable.vue'

    const state = reactive({
        //Books: [],
    });
    /*    onMounted(async () => {
        getBooks();
    });
    async function getBooks(){
        const response = await axios.post(route('getBooks'))
        .then(response => {
            console.log(response);
            state.Books = response.data;
        });
    }
    */
    /*
    const defaultFormObject = {
        title: null, author: null, image: null
    };

    export default {
        props: ['data'],
        components: {
            AppLayout,
            Pagination,
            BookForm
        },
        onMounted(){
            console.log('onMount');
            getBooks();
        },
        data(){
            return {
                isFormOpen: false,
                isFormEdit: false,
                formObject: defaultFormObject,
                books: []
            }
        },
        methods: {
            saveItem(item){
                console.log(item);
            },
            closeModal(){
                this.isFormOpen = false;
            },
            openForm(item){
                this.isFormOpen = true;
                this.isFormEdit = !!item;
                this.formObject = item ? item : defaultFormObject;
            },
            deleteItem(item){
                console.log('delete ' + item.id);
            },
            async getBooks(){
                books = axios.post(route('getBooks'));
            }
        }
    }
    */
</script>