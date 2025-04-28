<?php

use Illuminate\Database\Seeder;

class DataInitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Admin\Privacy::query()->truncate();

        \App\Model\Admin\Privacy::query()->create([
            'id' => 1,
            'title' => 'title',
            'body' => 'body'
        ]);

        \App\Model\Admin\Term::query()->truncate();

        \App\Model\Admin\Term::query()->create([
            'id' => 1,
            'title' => 'title',
            'body' => 'body'
        ]);

        \App\Model\Admin\Delivery::query()->truncate();

        \App\Model\Admin\Delivery::query()->create([
            'id' => 1,
            'title' => 'title',
            'body' => 'body'
        ]);

        \App\Model\Admin\Refund::query()->truncate();

        \App\Model\Admin\Refund::query()->create([
            'id' => 1,
            'title' => 'title',
            'body' => 'body'
        ]);
    }
}
