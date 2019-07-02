<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $admin = [
            [
                'name' => 'Phuong Tran',
                'email' => 'phuongtran99.k60@gmail.com',
                'phone' => $faker->phoneNumber,
                'password' => bcrypt('123456'),
                'facebook_id' => $faker->uuid,
                'google_id' => $faker->uuid,
                'avatar' => "1.jpg",
                'slug' => "phuong-tran",
            ],
        ];

        DB::table('users')->insert($admin);

        for ($i = 1; $i < 16; $i++) {
            $slug = str_slug($faker->name);
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique->email,
                'phone' => $faker->phoneNumber,
                'password' => bcrypt('123456'),
                'facebook_id' => $faker->uuid,
                'google_id' => $faker->uuid,
                'avatar' => $i . ".jpg",
                'slug' => $slug ,
            ]);
        }
    }
}
