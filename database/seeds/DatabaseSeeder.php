<?php

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
        DB::table('category')->insert(['title' => 'Fashion']);
        DB::table('category')->insert(['title' => 'Finance']);
        DB::table('category')->insert(['title' => 'Technology']);
        DB::table('category')->insert(['title' => 'Travel']);
        DB::table('category')->insert(['title' => 'Science']);
    }
}
