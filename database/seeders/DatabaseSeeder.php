<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $path = base_path() . '/database/startati_cms.sql';
        $sql = file_get_contents($path);
        \DB::unprepared($sql);

    }



}
