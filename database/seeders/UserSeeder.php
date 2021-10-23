<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        $firstUser = User::first();
        $firstUser->name = 'test';
        $firstUser->email = '1st@te.st';
        $firstUser->save();
    }
}
