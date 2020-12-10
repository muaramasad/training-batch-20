<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        $names = ["jhon","adam"];
        foreach ($roles as $key => $value) {
            DB::table('users')->insert([
                'id' => Str::uuid(),
                'name' => $names[$key],
                'email' => $names[$key].'@local.com',
                'password' => Hash::make('secret'),
                'role_id' => $value['id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
