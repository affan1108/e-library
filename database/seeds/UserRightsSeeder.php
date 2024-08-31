<?php

use Illuminate\Database\Seeder;
use App\Libraries\Csv;

class UserRightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('user_rights')->truncate();

        $csv = \Storage::disk('database')->get('csv/user_rights.csv');
        $lines = Csv::toArray($csv);

        foreach ($lines as $x) {
            $userRight = new \App\UserRight;
            $userRight->id = $x[0];
            $userRight->user_id = $x[1];
            $userRight->app_id = $x[2];
			$userRight->save();            
        }
    }
}
