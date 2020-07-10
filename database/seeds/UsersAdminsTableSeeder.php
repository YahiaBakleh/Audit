<?php

use Illuminate\Database\Seeder;

class UsersAdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'email' => 'user@audit.com',
            'name' => 'user'
        ]);

        factory(\App\Models\Admin::class)->create([
            'email' => 'admin@audit.com',
            'username' => 'audit',
            'name' => 'admin'
        ]);


        factory(\App\Models\Admin::class)->create([
            'email' => 'assistant@audit.com',
            'username' => 'assistant',
            'name' => 'assistant'
        ]);
    }
}
