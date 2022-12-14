<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->seed(123);
        for ($i = 0; $i < 4; $i++) {
            Author::create(
                [
                    'nama' => $faker->firstName . ' ' . $faker->lastName,
                    'kota' => $faker->city,
                    'negara' => $faker->country,
                ]
            );
        }

        for ($i = 0; $i < 10; $i++) {
            Book::create(
                [
                    'id' => $faker->isbn13(),
                    'judul' => $faker->sentence,
                    'halaman' => $faker->randomNumber(3),
                    'kategori' => $faker->randomElement(['Majalah', 'Ensiklopedia', 'Naskah', 'Biografi', 'Kamus']),
                    'penerbit' => $faker->randomElement(['Gramedia', 'Deepublish', 'Bukunesia', 'Grasindo']),
                    'author_id' => $faker->numberBetween(1, 4),
                ]
            );
        }
    }
}
