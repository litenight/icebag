<?php

use App\Ticket;
use App\Priority;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            'low' => 'Low',
            'medium' => 'Medium',
            'high' => 'High',
        ] as $slug => $title) {
            Priority::create([
                'title' => $title,
                'slug' => $slug,
            ]);
        }

        create(Ticket::class, [], 20);
    }
}
