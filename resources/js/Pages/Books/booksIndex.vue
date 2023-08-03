<template>
    <app-layout title="Books">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Könyvek
            </h2>
        </template>

        <!-- Új elem felvitelle -->
        <div class="py-12" style="padding-bottom: 0px;">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex justify-between items=center p-5">
                        <div class="flex space-x-2 items-center">
                            Nyílvántartott könyvek oldala!<br/>
                            Itt listázhat, létrehozhat, frissíthet vagy törölhet könyvet!
                        </div>

                        <div class="flex space-x-2 items-center">
                            <button @click="openEditModal()" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3"
                            >Add New Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Könyvek listája -->
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <!-- selected ids -->
                    <div class="text-uppercase text-bold">id selected: {{state.selected}}</div>

                    <!-- settings -->
                    <div>
                        <secondary-button @click="settings_init">
                            Settings
                        </secondary-button>
                    </div>

                    <!-- table -->
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="bg-gray-100">
                                
                                <!-- header checkbox -->
                                <th scope="col" class="px-6 py-3" >
                                    <div>
                                        <input id="checkbox-all" 
                                            type="checkbox"
                                            v-model="state.selectAll"
                                            @click="select"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 
                                                dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 
                                                focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                                        <label for="checkbox-all" 
                                            class="sr-only">checkbox</label>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3" 
                                    v-show="state.columns.id.is_visible">
                                    <div class="flex items-center">
                                        {{ state.columns.id.label }}
                                        <a href="#">
                                            <SorterIcon/>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3" v-show="state.columns.title.is_visible">
                                    <div class="flex items-center">
                                        {{ state.columns.title.label }}
                                        <a href="#">
                                            <SorterIcon/>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3" v-show="state.columns.author.is_visible">
                                    <div class="flex items-center">
                                        {{ state.columns.author.label }}
                                        <a href="#">
                                            <SorterIcon/>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3" v-show="state.columns.image.is_visible">
                                    <div class="flex items-center">
                                        {{ state.columns.image.label }}
                                        <a href="#">
                                            <SorterIcon/>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3" width="250px" v-show="state.columns.action.is_visible">
                                    <div class="flex items-center">
                                        {{ state.columns.action.label }}
                                        <a href="#">
                                            <SorterIcon/>
                                        </a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="book in state.Books">
                                <td class="px-4 py-2 border">
                                    <div>
                                        <input :id="book.id" type="checkbox" :value="book.id" :key="book.id" v-model="state.selected" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 
                                            dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 
                                            focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                                        <label class="sr-only" :for="book.id">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border" v-show="state.columns.id.is_visible">{{ book.id }}</td>
                                <td class="px-4 py-2 border" v-show="state.columns.title.is_visible">{{ book.title }}</td>
                                <td class="px-4 py-2 border" v-show="state.columns.author.is_visible">{{ book.author }}</td>
                                <td class="px-4 py-2 border" v-show="state.columns.image.is_visible">{{ book.image }}</td>
                                <td class="px-4 py-2 w-45 border" width="250px" v-show="state.columns.action.is_visible">
                                    <div type="justify-start lg:justify-end" no-wrap>
                                        <button class="ml-4 bg-green-500 px-2 py-1 rounded text-white cursor-pointer"
                                                @click="editBook(book)">Szerkesztés</button>
                                        <button class="ml-4 bg-red-500 px-2 py-1 rounded text-white cursor-pointer" 
                                                @click="deleteBook_init(book)">Törlés</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mb-3 bg-white shadow bg-body rounded w-75 ln-max-width mx-auto p-3 d-flex align-items-center justify-content-center">
                        <v-pagination v-model="state.pagination.current_page" 
                            :pages="state.pagination.total_number_of_pages"  
                            :range-size="state.pagination.range"
                            active-color="#DCEDFF"
                            @update:modelValue="getBooks"/>
                    </div>

                </div>
            </div>
        </div>

    </app-layout>

    <!-- EDIT MODAL -->
    <dialog-modal :show="state.showEditModal" id="edit_modal">
        <template #title>
            <!--<span v-if="state.editingBook && state.editingBook.id">Edit Book</span>
            <span v-else>Create Book</span>-->
            {{ state.isEdit ? 'Edit Book' : 'Create Book' }}
        </template>

        <template #content>
            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <div v-if="errors">
                    <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
                        <p v-for="error in v" :key="error" class="text-sm">
                            {{ error }}
                        </p>
                    </div>
                </div>
                <!-- TITLE -->
                <div>
                    <label for="title" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Title</label>
                    <input type="text" id="title" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="title" v-model="state.Book.title" required>
                            <span></span>
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
            <primary-button type="button" class="ml-3" @click="storeBook()">
                {{ state.isEdit ? 'Edit Book' : 'Create Book' }}
            </primary-button>
        </template>

    </dialog-modal>

    <!-- CONFIRM DELETE MODAL -->
    <dialog-modal :show="state.showDeleteModal" id="delete_modal">
        <template #title>
            Delete Book
        </template>
        <template #content>
            Are you sure you want to delete this Book?
        </template>
        <template #footer>
            <secondary-button @click="closeDeleteModal()">Cancel</secondary-button>
            <primary-button type="button" class="ml-3" 
                @click="deleteBook()">Delete</primary-button>
        </template>
    </dialog-modal>

    <!-- SETTINGS MODAL -->
    <dialog-modal :show="state.showSettingsModal" id="settings_modal">
        <template #title>Settings</template>
        <template #content>
            <div v-for="(config, column) in state.columns" 
                :key="column" class="d-flex align-items-center">
                <input v-model="config.is_visible" 
                    :id="column" class="me-3" type="checkbox" />
                <label :for="column">{{ config.label }}</label>
            </div>
        </template>
        <template #footer>
            <secondary-button @click="closeSettingsModal()"
            >Cancel</secondary-button>
        </template>
    </dialog-modal>

</template>

<script setup>
    import {reactive, onMounted, watch, computed, ref} from 'vue';
    import axios from 'axios';
    import { initFlowbite } from 'flowbite';

    import AppLayout from '../../Layouts/AppLayout.vue';
    //import BookForm from '../../Components/Book/form.vue';
    import DialogModal from '@/Components/DialogModal.vue';

    import VPagination from '@hennge/vue3-pagination';
    import '@hennge/vue3-pagination/dist/vue3-pagination.css';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    import SorterIcon from '../../Components/icons/SorterIcon.vue';

    const local_storage_column_key = 'ln_books_grid_columns';

    const errors = ref('');

    const props = defineProps({});

    const defaultFormObject = {
        title: null,
        author: null,
        image: null,
    };

    const state = reactive({
        // Összes rekord
        Books: [],
        // Kiválasztott rekord
        Book: newBook(),
        // Szerkeszteni kívánt rekord
        editingBook: null,
        // Törölni kívánt rekord
        deletingBook: null,

        // Van nyitott ablak
        isFormOpen: false,
        // A folyamatban levő művelet szerkesztés
        isEdit: false,

        // "settings" modal megnyitása / bezárása
        showSettingsModal: false,
        // "edit" modal megnyitása / bezárása
        showEditModal: false,
        // "delete" modal megnyitása / bezárása
        showDeleteModal: false,

        // Kiválasztott rekordok azonosítója
        selected: [],
        // Összes elem ki van választva
        selectAll: false,

        // Táblázat oszlopai
        columns: {
            id: {
                label: '#',
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

        // Oldaltörés
        pagination: {
            current_page: 1,
            total_number_of_pages: 0,
            per_page: 10,
            range: 5,
        },
        // Szűrés és keresés
        filters: {
            tags: [],
            search: null
        },
    });

    // Figyeli az oszlopok változását
    watch(state.columns, (new_value, old_value) => {
        //console.log(new_value);
        localStorage.setItem(local_storage_column_key, JSON.stringify(new_value));
    });

    onMounted(async () => {
        initFlowbite();

        getBooks();

        let columns = localStorage.getItem(local_storage_column_key);
        
        //console.log('columns', columns);

        if (columns) {
            columns = JSON.parse(columns);
            for(const column_name in columns){
                state.columns[column_name] = columns[column_name];
            }
        }
    });
    
    function select(){
        state.selected = [];
        if( !state.selectAll ){
            state.Books.forEach(book => {
                //console.log(book);
                state.selected.push(book.id);
            });
        }
    }

    // Táblázat adatok lekérése
    function getBooks(page = state.pagination.current_page) {
        axios.post(route('getBooks', {
            filters: state.filters,
            config: {
                per_page: state.pagination.per_page,
            },
            page
        }))
        .then(response => {
            //console.log(response.data.data);
            state.Books = response.data.data;
            state.pagination.total_number_of_pages = response.data.last_page;
            state.pagination.current_page = response.data.current_page;

            //console.log(state.pagination);
        });
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

        openEditModal();
    }


    function storeBook(){
        //console.log('storeBook');
        errors.value = '';
        axios.post(route('books_store'), state.Book)
        .then(res => {
            console.log('res', res);
        })
            .catch(e => {
                if( e.response.status == 422 ){
                    console.log(e.response.data.errors);
                    errors.value = e.response.data.errors;
                }
            });
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
                //
                for(let i = 0; i < state.Books.length; i++){
                    if(state.Books[i].id === response.data.id){
                        state.Books[i] = response.data;
                    }
                }

                closeEditModal();
            })
            .catch((error) => {
                console.log('updateBook', error);
            });
        }else{
            // Rekord mentése
            axios.post(route('books_store'), {
                title: state.Book.title,
                author: state.Book.author,
                image: state.Book.image,
            })
            .then((response) => {
                //state.Book = newBook();
                state.Books.push(response.data.book);

                closeEditModal();
            })
            .catch((error) => {
                console.log('storeBook', error);
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

    function settings_init(){
        openSettingsModal();
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
</script>