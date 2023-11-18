<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Bill Wilson',
                'email'=>'bill_wilson@gmail.com',
                'role'=>'Project Manager',
                'password'=>bcrypt('wilson')
            ],
            [
                'name'=>'Adam El Gato',
                'email'=>'adam@gmail.com',
                'role'=>'Employee',
                'password'=>bcrypt('adam')
            ],
            [
                'name'=>'Rudi',
                'email'=>'rudi@gmail.com',
                'role'=>'Marketing',
                'password'=>bcrypt('rudi')
            ],
            [
                'name'=>'Jumanji',
                'email'=>'jumanji@gmail.com',
                'role'=>'Employee',
                'password'=>bcrypt('jumanji')
            ],
            [
                'name'=>'Mardianto',
                'email'=>'mardianto@gmail.com',
                'role'=>'Project Manager',
                'password'=>bcrypt('mardianto')
            ],
            [
                'name'=>'-',
                'email'=>'-',
                'role'=>'Employee',
                'password'=>bcrypt('-')
            ],
            
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
        
    }
}
