<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use PhpParser\Node\Name;

use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $data = [
            [
                'name' => 'category 1',
                'slug' => \Str::slug('category 1')
            ],
            [
                'name' => 'Python',
                'slug' => \Str::slug('Python')
            ],
            [
                'name' => 'Java',
                'slug' => \Str::slug('Java')

            ],
            [
                'name' => 'C++',
                'slug' => \Str::slug('C++')

            ],
            [
                'name' => 'Ruby',
                'slug' => \Str::slug('Ruby')

            ],
        ];
        Category::insert($data);

    }
}
