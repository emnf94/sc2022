<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'reknorek' => $faker->creditCardNumber,
                'reknama' => $faker->name,

            ];
            print_r($data);
            $this->db->table('mrek')->insert($data);
        }
    }
}
