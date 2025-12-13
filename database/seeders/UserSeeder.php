<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name'              => 'Naveen',
                'email'             => 'naveen.purple23@gmail.com',
                'role'              => 'Admin',
                'email_verified_at' => now(),
                'password'          => Hash::make('Welcome@123'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'Krishna',
                'email'             => 'imeetifytest2@gmail.com',
                'role'              => 'Admin',
                'email_verified_at' => now(),
                'password'          => Hash::make('Welcome@123'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'Aathavan Mass',
                'email'             => 'timeetify@gmail.com',
                'role'              => 'Admin',
                'email_verified_at' => now(),
                'password'          => Hash::make('Welcome@123'),
                'remember_token'    => Str::random(10),

            ],
            [
                'name'              => 'Prasanth',
                'email'             => 'imeetifydeveloper@gmail.com',
                'role'              => 'Admin',
                'email_verified_at' => now(),
                'password'          => Hash::make('Welcome@123'),
                'remember_token'    => Str::random(10),

            ],

        ];

        foreach ($users as $user) {
            $user = User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
            ///Plan upgrade to the user

        }
    }
}
