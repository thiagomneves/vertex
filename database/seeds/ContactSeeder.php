<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => 'Luiza',
            'email' => 'luiza@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Emilia',
            'email' => 'Emilia@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Rafael',
            'email' => 'rafael@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Marcela',
            'email' => 'marcela@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Thiago',
            'email' => 'thiago@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Beatriz',
            'email' => 'beatriz@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Renata',
            'email' => 'renata@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Flavia',
            'email' => 'flavia@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Gabriel',
            'email' => 'gabriel@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Vanessa',
            'email' => 'vanessa@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Marcos',
            'email' => 'marcos@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Carolina',
            'email' => 'carol@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Alexandre',
            'email' => 'ogrande@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Sara',
            'email' => 'sara@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Daniela',
            'email' => 'dani@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'Daniel',
            'email' => 'danielpaladino@gmail.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);

        DB::table('contacts')->insert([
            'name' => 'John',
            'email' => 'doe@yahoo.com',
            'phone' => '(' . rand(11,99) . ') ' . rand(80000,99999) . '-' . str_pad(rand(0,9999), 4,'0'),
            'cep' => str_pad(rand(1000,99999), 5, '0') .'-' . str_pad(rand(0,999), 3, '0')
        ]);
    }
}
