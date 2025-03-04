<?php

include("../vendor/autoload.php");

use Faker\Factory as Faker;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$faker = Faker::create();
$table = new UsersTable(new MySQL());

if ($table) {
    echo "Database connection opened. \n";

    for ($i = 0; $i < 20; $i++) {
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'password' => md5('password'),
            'role_id' => $i < 5 ? rand(1, 2) : 2
        ];

        try {
            $table->insert($data);
        } catch (Exception $e) {
            echo "Error inserting data: " . $e->getMessage() . "\n";
        }
    }

    echo "Generated data: " . json_encode($data) . "\n";
}
