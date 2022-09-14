<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'          => 'Pizzeria',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Ristorante',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Pesce',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Vegetariano',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Vegano',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Bergamasco',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Etnico',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Asiatico',
                'description'   => 'lorem ipsum',
            ],
            [
                'name'          => 'Messicano',
                'description'   => 'lorem ipsum',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
