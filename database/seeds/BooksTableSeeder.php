<?php

use Illuminate\Database\Seeder;

use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           //For insert Books Data...................................
           $book = new Book; //Book 1........
           $book->title     = 'How to Train Your Dog';
           $book->image     = 'images/uploads/books/images/b-1.jpg';
           $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
           $book->save();
            
            $book = new Book; //Book 2........
            $book->title     = 'How to Care Your Birds';
            $book->image     = 'images/uploads/books/images/b-2.jpg';
            $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
            $book->save();

            $book = new Book; //Book 3........
            $book->title     = 'Birds Breeding';
            $book->image     = 'images/uploads/books/images/b-3.jpg';
            $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
            $book->save();

            $book = new Book; //Book 4........
            $book->title     = 'Rabbit History';
            $book->image     = 'images/uploads/books/images/b-4.jpg';
            $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
            $book->save();

            $book = new Book; //Book 5........
            $book->title     = 'How to Care Your Birds';
            $book->image     = 'images/uploads/books/images/b-5.jpg';
            $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
            $book->save();

            $book = new Book; //Book 6........
            $book->title     = 'Birds Train Tam Birds';
            $book->image     = 'images/uploads/books/images/b-6.jpg';
            $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
            $book->save();

            $book = new Book; //Book 7........
            $book->title     = 'Rabbit Interesting History ';
            $book->image     = 'images/uploads/books/images/b-7.jpg';
            $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
            $book->save();

            $book = new Book; //Book 8........
            $book->title     = 'How to Train Your Dog Perfectly';
            $book->image     = 'images/uploads/books/images/b-8.jpg';
            $book->books     = 'url=https://calibre-ebook.com/downloads/demos/demo.docx';
            $book->save();
    }
}
