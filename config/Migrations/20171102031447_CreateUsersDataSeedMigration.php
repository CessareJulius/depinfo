<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateUsersDataSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Users', 9, [
            "role" => "user",
            "cargo" => "empleado",
            "usuario" => function () use ($faker) {
                return $faker->firstName();
            },
            "clave" => function () {
                $hasher = new DefaultPasswordHasher();
                return $hasher->hash("empleado");
            },
            "active" => function () {
                return rand(0, 1);
            },
            "created" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "modified" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "per_id" => function () {
                return rand(2, 10);
            },
            "tur_id" => function () {
                return rand(1, 2);
            }
        ]);
        $populator->execute();
    }
}
