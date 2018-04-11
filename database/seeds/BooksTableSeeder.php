<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #pegar uma coleção de categoria.
        $categories=CodePub\Models\Category::all();

        #Cria os livros,depois each faz o relacionamento dos livros com as categorias.
        factory(\CodePub\Models\Book::class,50)->create()->each(function ($book) use ($categories){
            #random com parametro retorna uma subcoleção de categoria.
            $categoriesRandom=$categories->random(4);
            #metodo sync relacionar os id's, pluck gera um arrya com id'
            $book->categories()->sync($categoriesRandom->pluck('id')->all());
        });
    }
}
