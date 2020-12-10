<?php

use Illuminate\Database\Seeder;

class OtpCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all();
        foreach ($users as $key => $value) {
            DB::table('otp_codes')->insert([
                'expired' => date('Y-m-d H:i:s', strtotime('+1 day')),
                'code' => rand(111, 9999),
                'user_id' => $value['id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
