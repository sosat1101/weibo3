<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->slice(1);
        $users_id = $users->pluck('id')->toArray();
        $user_1 = User::find(1);
        $user_1->follow($users_id);
        foreach ($users as $user) {
            $user->follow(1);
        }
    }
}
