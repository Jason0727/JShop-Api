<?php

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
        # 地区Seeder
        $this->call(DistrictsSeeder::class);
        # 头像库Seeder
        $this->call(HeadLibrariesSeeder::class);
        # 平台Seeder
        $this->call(PlatformsSeeder::class);
        # 用户Seeder
        $this->call(UsersSeeder::class);
        # 平台用户Seeder
        $this->call(OauthUsersSeeder::class);
    }
}
