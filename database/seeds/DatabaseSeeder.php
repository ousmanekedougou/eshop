<?php

use App\Model\Admin\info;
use App\User;
use App\Model\Admin\team;
use App\Model\Admin\admin;
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
        // $this->call(UsersTableSeeder::class);

         // Seed du premier image comme info
         info::create([
            'email' => 'eshop@gmail.com',
            'phone' => '+221 33 098 34 56',
            'adresse' => 'HLM',
            'bp' => '0000000000',
            'fax' => '0000000000',
        ]);

           // Seed du premier image comme info
           team::create([
            'nom' => 'Diallo',
            'prenom' => 'Ousmane',
            'email' => 'eshop@gmail.com',
            'phone' => '+221 33 098 34 56',
            'adresse' => 'HLM',
            'status' => 'President',
            'Commission' => 'Organisation',
            'image' => '/uploads/inscription/_1593793049.jpeg',
        ]);

        User::create([
            'genre' => "1",
            'nom' => "Diallo",
            'prenom' => "Ousmane",
            'email' => "email@gmail.com",
            'phone' => "789096478",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'addresse' => 'Kedougou',
            'date' => '2020-12-16 16:11:09',
            'status' => '1',
            'status_admin' => '1',
            'image' => '/uploads/inscription/_1593793049.jpeg',
            
        ]);
    }

  
}
