<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actor;
class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Actor 1',
                'slug' => \Str::slug('Actor 1')
            ],
            [
                'name' => 'Actor 2',
                'slug' => \Str::slug('Actor 2')
            ],
            [
                'name' => 'Actor 3',
                'slug' => \Str::slug('Actor 3')

            ],
            [
                'name' => 'Actor 4',
                'slug' => \Str::slug('Actor 4')

            ],
            [
                'name' => 'Actor 5',
                'slug' => \Str::slug('Actor 5')

            ],
        ];
        Actor::insert($data);
    }
}
