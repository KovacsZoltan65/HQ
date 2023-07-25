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
import axios from 'axios';

    const local_storage_column_key = 'books_columns';

    const props = defineProps({});

    const defaultFormObject = {
        title: null,
        author: null,
        image: null,
    };

    const state = reactive({
        Books: [],
        Book: newBook(),
        editingBook: null,
        deletingBook: null,

        isFormOpen: false,
        isEdit: false,

        openSettingsModal: false,
        openEditModal: false,
        openDeleteModal: false,

        columns: {
            id: {
                label: 'ID',
                is_visible: true,
            },
            title: {
                label: 'Title',
                is_visible: true,
            },
            author: {
                label: 'Author',
                is_visible: true,
            },
            image: {
                label: 'Image',
                is_visible: true,
            },
            action: {
                label: 'Action',
                is_visible: true,
            },
        },

        pagination: {
            current_page: 1,
            per_page: 10,
            total: 0,
            range: 5,
        },
    });

    watch(state.columns, (new_value, old_value) => {
        localStorage.setItem(local_storage_column_key, JSON.stringify(new_value));
    });

    onMounted(() => {
        initFlowbite();
        getBooks();

        let columns = localStorage.getItem(local_storage_column_key);
        if (columns) {
            state.columns = JSON.parse(columns);
            for(const column_name in columns){
                state.columns[column_name] = columns[column_name];
            }
        }
    });
    
    function getBooks(){
        axios.post(route('getBooks'))
        .then(response => {
            //console.log(response);
            state.Books = response.data;
            //console.log(state.Books.links);
        });
    }
    
    function openForm(item) {
        console.log('OPEN FORM');

        state.isFormOpen = true;
        state.isFormEdit = !!item;
        state.formObject = item ? item : defaultFormObject;
    }

    // Új könyv előkészítése
    function newBook_init(){
        state.Book = newBook();
        state.editingBook = null;
        state.isEdit = false;

        openEditModal();
    }

    // Új könyv adatai
    function newBook(){
        return {
            id: null,
            title: null,
            author: null,
            image: null,
        };
    }

    // Szerkesztés
    function editBook(book){
        state.editingBook = JSON.parse(JSON.stringify(book));
        state.Book = state.editingBook;
        state.isEdit = true;

        state.openEditModal = true;
    }

    function saveBook(){
        
        if(state.editingBook && state.editingBook.id){
            // Rekord frissítése
            axios.put(route('books_update', {book: state.editingBook.id}), {
                title: state.editingBook.title,
                author: state.editingBook.author,
                image: state.editingBook.image,
            })
            .then((response) => {
                openEditModal();

                const b = response.data.book;

                for(let i = 0; i < state.Books.length; i++){
                    if(state.Books[i].id === b.id){
                        state.Books[i] = b;
                    }
                }
            })
            .catch((error) => {
                console.log('saveBook', error);
            });
        }else{
            // Rekord mentése
            axios.post(route('books_store'), {
                title: state.Book.title,
                author: state.Book.author,
                image: state.Book.image,
            })
            .then((response) => {
                state.Book = newBook();
                state.Books.push(response.data.book);

                closeEditModal();
            })
            .catch((error) => {
                console.log('saveBook', error);
            });
        }

        cancelEdit();
        return;
    }

    // Törlés előkészítése
    function deleteBook_init(book){
        state.editingBook = null;
        state.deletingBook = book;

        openDeleteModal();
    }

    // Törlés
    function deleteBook(book){

        axios.delete(route('books_delete', {book: state.deletingBook.id}))
        .then((response) => {
            state.Books = state.Books.filter(book => book.id !== state.deletingBook.id);
            state.deletingBook = null;

            openDeleteModal();
        })
        .catch((error) => {
            console.log('deleteBook', error);
        });
    }

    // Szerkesztés megszakítása
    function cancelEdit(){
        state.editingBook = null;
        state.Book = newBook();
    }

    // --------------------
    // SETTINGS MODAL
    // --------------------
    function openSettingsModal() {
        state.openSettingsModal = true;
    }

    function closeSettingsModal() {
        state.openSettingsModal = false;
    }

    // --------------------
    // EDIT MODAL
    // --------------------
    function openEditModal() {
        state.openEditModal = true;
    }

    function closeEditModal() {
        state.openEditModal = false;
    }

    // --------------------
    // DELETE MODAL
    // --------------------
    function openDeleteModal() {
        state.openDeleteModal = true;
    }
    
    function closeDeleteModal() {
        state.openDeleteModal = false;
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