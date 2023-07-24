<template>
    <app-layout title="Books">

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
                            <tr v-for="book in state.Books.data">
                                <td class="px-4 py-2 border">{{ book.id }}</td>
                                <td class="px-4 py-2 border">{{ book.title }}</td>
                                <td class="px-4 py-2 border">{{ book.author }}</td>
                                <td class="px-4 py-2 border">{{ book.image }}</td>
                                <td class="px-4 py-2 border">action</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mb-3 bg-white shadow bg-body rounded w-75 ln-max-width mx-auto p-3 d-flex align-items-center justify-content-center">
                        <v-pagination v-model="state.pagination.current_page" 
                                    :pages="state.pagination.total"  
                                    :range-size="state.pagination.range"
                                    active-color="#DCEDFF"
                                    @update:modelValue="getBooks"/>
                    </div>

                </div>
            </div>
        </div>

    </app-layout>
</template>

<script setup>
    import {reactive, onMounted, watch, computed} from 'vue';
    import AppLayout from '../../Layouts/AppLayout.vue';
    import BookForm from '../../Components/Book/form.vue';
    import { initFlowbite } from 'flowbite';

    import VPagination from '@hennge/vue3-pagination';
    import '@hennge/vue3-pagination/dist/vue3-pagination.css';

    

    const state = reactive({
        Books: [],
        pagination: {
            current_page: 1,
            per_page: 10,
            total: 0,
            range: 5,
        },
    });

    onMounted(() => {
        initFlowbite();
        getBooks();
    });
    
    function getBooks(){
        axios.post(route('getBooks'))
        .then(response => {
            //console.log(response);
            state.Books = response.data;
            console.log(state.Books.links);
        });
    }
    
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