<?php

use Illuminate\Database\Seeder;
use App\Libraries\Csv;
use App\Repositories\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        $csv = \Storage::disk('database')->get('csv/users.csv');
        $lines = Csv::toArray($csv);

        foreach ($lines as $x) {
            $id = $x[0];
            $name = $x[1];
            $email = $x[2];
            $password = $x[3];
            $departmentId = $x[4];
            $jabatanId = $x[5];
            $active = $x[6];
            
            $user = User::registerFromSeeder($name, $email, $password, $departmentId, $jabatanId, $active);
        }
    }
}
