<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'names' => 'Katerine',
                'surnames' => 'Ordoñez',
                'document_number' => '1083814056',
                'address' => 'Calle 45 Cra12 # 12-78',
                'cellphone' => '3124314528',
                'email' => 'ko@gmail.com',
                'gender' => 'femenino',
                'document_id' => '1',
                'rol_id' => '1',
                'company_id' => '1',
                'password' => 'prueba123'
            ],


            [
                'names' => 'Carlos',
                'surnames' => 'Lopez',
                'document_number' => '1083814045',
                'address' => 'Calle 45 Cra12 # 12-78',
                'cellphone' => '3124314512',
                'email' => 'cl@gmail.com',
                'gender' => 'masculino',
                'document_id' => '2',
                'rol_id' => '2',
                'company_id' => '1',
                'password' => 'prueba123'
            ],
            [
                'names' => 'Samanta',
                'surnames' => 'Herrera',
                'document_number' => '1083814089',
                'address' => 'Calle 45 Cra12 # 12-78',
                'cellphone' => '3124314556',
                'email' => 'sh@gmail.com',
                'gender' => 'femenino',
                'document_id' => '3',
                'rol_id' => '3',
                'company_id' => '1',
                'password' => 'prueba123'
            ],
            [
                'names' => 'Sebastian',
                'surnames' => 'Caicedo',
                'document_number' => '10014068975',
                'address' => 'Calle 45 Cra12 # 12-78',
                'cellphone' => '31243145296',
                'email' => 'sc@gmail.com',
                'gender' => 'masculino',
                'document_id' => '1',
                'rol_id' => '1',
                'company_id' => '1',
                'password' => 'prueba123'
            ],
            [
                'names' => 'Elena',
                'surnames' => 'Sandobal Peña',
                'document_number' => '1004415278',
                'address' => 'Calle 45 Cra12 # 12-78',
                'cellphone' => '3137256892',
                'email' => 'esp@gmail.com',
                'gender' => 'femenino',
                'document_id' => '2',
                'rol_id' => '2',
                'company_id' => '1',
                'password' => 'prueba123'
            ],
            [
                'names' => 'Santiago',
                'surnames' => 'Alarcon',
                'document_number' => '1083812659',
                'address' => 'Calle 45 Cra12 # 12-78',
                'cellphone' => '3124311235',
                'email' => 'as@gmail.com',
                'gender' => 'masculino',
                'document_id' => '3',
                'rol_id' => '3',
                'company_id' => '1',
                'password' => 'prueba123'
            ]

        ];
        foreach ($users as $user) {
            User::create([
                'names' => $user['names'],
                'surnames' => $user['surnames'],
                'document_number' => $user['document_number'],
                'address' => $user['address'],
                'cellphone' => $user['cellphone'],
                'email' => $user['email'],
                'gender' => $user['gender'],
                'document_id' => $user['document_id'],
                'rol_id' => $user['rol_id'],
                'company_id' => $user['company_id'],
                'password' => Hash::make($user['password']),

            ]);
        }
    }
}
