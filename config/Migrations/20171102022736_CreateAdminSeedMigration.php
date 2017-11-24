<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateAdminSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Users', 1, [
            "role" => "admin", 
            "cargo" => "administrador",
            "usuario" => "cessare",
            "clave" => function() {
                $hasher = new DefaultPasswordHasher();
                return $hasher->hash("cesar20149");
            },
            "active" => 1,
            "created" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "modified" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "per_id" => 1,
            "tur_id" => 1
        ]);
        $populator->execute();
    }
}
