<?php
use Migrations\AbstractMigration;

class CreatePersonSeedMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        /*$faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Personas', 1, [
            "cedula" => "26026083", 
            "nombre" => "cessare julius",
            "apellido" => "yanez",
            "telefono" => "04144532962",
            "status" => 0,
            "created" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "modified" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            }
        ]);
        $populator->execute();*/
    }
}
