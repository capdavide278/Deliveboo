<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name'          => 'Andrea',
                'surname'       => 'Pinco',
                'email'         => 'andreap@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '12345678910',
                'p_iva'         => '52345678910',
                'date_of_birth' => '1970-11-01',
            ],
            [
                'name'          => 'Gloria',
                'surname'       => 'Pallina',
                'email'         => 'gloriap@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '12345678910',
                'p_iva'         => '12345678911',
                'date_of_birth' => '1990-12-30',
            ],
            [
                'name'          => 'Davide',
                'surname'       => 'Pallino',
                'email'         => 'davidep@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '23456789101',
                'p_iva'         => '23456789102',
                'date_of_birth' => '2000-02-23',
            ],
            [
                'name'          => 'Giuseppe',
                'surname'       => 'PincoPallo',
                'email'         => 'beppep@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '34567891012',
                'p_iva'         => '34567891022',
                'date_of_birth' => '1950-05-12',
            ],
            [
                'name'          => 'Franco',
                'surname'       => 'Rossi',
                'email'         => 'franco@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '3445435012',
                'p_iva'         => '354391022',
                'date_of_birth' => '1987-02-11',
            ],
            [
                'name'          => 'Alessandro',
                'surname'       => 'Verdi',
                'email'         => 'verdiAle@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '345643591012',
                'p_iva'         => '3434591022',
                'date_of_birth' => '1979-05-02',
            ],
            [
                'name'          => 'Nathan',
                'surname'       => 'Bianchi',
                'email'         => 'nat@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '645456465456',
                'p_iva'         => '12342356789',
                'date_of_birth' => '1990-05-05',
            ],
            [
                'name'          => 'Noah',
                'surname'       => 'Giusti',
                'email'         => 'noahGiusti@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '3456743512',
                'p_iva'         => '34523491022',
                'date_of_birth' => '1978-11-06',
            ],
            [
                'name'          => 'Rossella',
                'surname'       => 'Franzoni',
                'email'         => 'laRoss@email.com',
                'password'      => Hash::make('password'),
                'phonenumber'   => '33232324412',
                'p_iva'         => '34567234562',
                'date_of_birth' => '1989-01-01',
            ]

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
