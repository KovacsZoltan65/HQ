<?php

namespace Database\Seeders;

//use Database\Factories\BookFactory;


use Database\Factories\BookFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$fact = new BookFactory();
        //$fact->count(1000)->create();
        
        Storage::deleteDirectory('public');
        
        $this->command->warn(PHP_EOL . 'Create books...');
        
        //$book = $this->command->withProgressBar(1000, function(){
        //    $fact = new BookFactory();
        //    $fact->count(1000)->create();
        //});
        
        $book = $this->command->withProgressBar(1000, fn () => 
            (new BookFactory())->count(1000)->create()
        );
        
        $this->command->info(PHP_EOL . 'Books created');
    }
}
