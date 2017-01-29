<?php

use Phinx\Seed\AbstractSeed;

class FillComplicatedTable extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $data = [];
        $sixMonths = new DateInterval('P6M');
        for ($i = 0;  $i < 100000; $i++) {
            $data[] = array(
                'created' => $faker->dateTimeThisYear->add($sixMonths)->format('Y-m-d H:i:s'),
                'name' => $faker->name,
                'is_set' => $faker->randomElement([0, 1])
            );
        }

        $posts = $this->table('complicated_table');
        $posts->insert($data)
            ->save();
    }
}
