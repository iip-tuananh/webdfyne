<?php

use Illuminate\Database\Seeder;

class AddAboutDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Admin\About::query()->truncate();

        $about = new \App\Model\Admin\About();
        $about->body = 'body';
        $about->created_at = 1;
        $about->updated_at = 1;
        $about->save();
    }
}
