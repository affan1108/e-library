<?php

use Illuminate\Database\Seeder;
use App\Libraries\Csv;

class AppsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('apps')->truncate();

        $csv = \Storage::disk('database')->get('csv/apps.csv');
        $lines = Csv::toArray($csv);

        foreach ($lines as $x) {
            $app = new \App\App;
            $app->id = $x[0];
            $app->name = $x[1];
            $app->domain = $x[2];
            $app->ip_address = $x[3];
            $app->description = $x[4];
			$app->save();            
        }
    }
}
