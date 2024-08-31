<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AppsSeeder::class);
        $this->call(KategoriBeritasSeeder::class);
        $this->call(AreaKerjasSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(JabatansSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserRightsSeeder::class);
    }
}
