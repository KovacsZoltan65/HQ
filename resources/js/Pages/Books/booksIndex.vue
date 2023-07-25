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

                    <button @click="openEditModal()" 
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

    <!-- EDIT MODAL -->
    <dialog-modal :show="state.showEditModal">
        <template #title>
            <!--<span v-if="state.editingBook && state.editingBook.id">Edit Book</span>
            <span v-else>Create Book</span>-->
            {{ state.isEdit ? 'Edit Book' : 'Create Book' }}
        </template>

        <template #content>
            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <!-- TITLE -->
                <div>
                    <label for="title" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Title</label>
                    <input type="text" id="title" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="title" v-model="state.Book.title" required>
                </div>

                <!-- AUTHOR -->
                <div>
                    <label for="author" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Author</label>
                    <input type="text" id="author" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Author" v-model="state.Book.author" required>
                </div>

                <!-- IMAGE -->
                <div>
                    <label for="image" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Image</label>
                    <input type="text" id="image" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Image" v-model="state.Book.image" required>
                </div>

            </div>
        </template>

        <template #footer>
            <secondary-button @click="closeEditModal()">Cancel</secondary-button>
            <primary-button type="button" class="ml-3" @click="saveBook()">
                {{ state.isEdit ? 'Edit Book' : 'Create Book' }}
            </primary-button>
        </template>

    </dialog-modal>

    <!-- CONFIRM DELETE MODAL -->
    <dialog-modal :show="state.showDeleteModal">
        <template #title>
            Delete Book
        </template>
        <template #content></template>
        <template #footer>
            <secondary-button @click="closeDeleteModal()">Cancel</secondary-button>
            <primary-button type="button" class="ml-3" @click="deleteBook()">Delete</primary-button>
        </template>
    </dialog-modal>

    <!-- SETTINGS MODAL -->
    <dialog-modal :show="state.showSettingsModal">
        <template #title>Settings</template>
        <template #content>
            <fieldset>
                <legend class="sr-only">Checkbox Variant</legend>
                <div class="flex items-center mb-4" 
                     v-for="(config, column) in state.columns" 
                     :key="column">

                    <input v-model="config.is_visible" 
                           :id="column" type="checkbox" value=""
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label :for="column" 
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >{{ config.label }}</label>
                </div>
            </fieldset>
        </template>
        <template #footer>
            <secondary-button @click="closeSettingsModal()">Cancel</secondary-button>
        </template>
    </dialog-modal>

</template>

<script setup>
    import {reactive, onMounted, watch, computed} from 'vue';
    import axios from 'axios';
    import { initFlowbite } from 'flowbite';

    import AppLayout from '../../Layouts/AppLayout.vue';
    //import BookForm from '../../Components/Book/form.vue';
    import DialogModal from '@/Components/DialogModal.vue';

    import VPagination from '@hennge/vue3-pagination';
    import '@hennge/vue3-pagination/dist/vue3-pagination.css';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

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

        showSettingsModal: false,
        showEditModal: false,
        showDeleteModal: false,

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

        state.showEditModal = true;
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
        state.showSettingsModal = true;
    }

    function closeSettingsModal() {
        state.showSettingsModal = false;
    }

    // --------------------
    // EDIT MODAL
    // --------------------
    function openEditModal() {
        state.showEditModal = true;
    }

    function closeEditModal() {
        cancelEdit();
        state.showEditModal = false;
    }

    // --------------------
    // DELETE MODAL
    // --------------------
    function openDeleteModal() {
        state.showDeleteModal = true;
    }
    
    function closeDeleteModal() {
        state.showDeleteModal = false;
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