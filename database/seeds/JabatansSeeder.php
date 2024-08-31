<?php

use Illuminate\Database\Seeder;
use App\Libraries\Csv;

// Repositories
use App\Repositories\Jabatan;

class JabatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('m_jabatans')->truncate();

        $csv = \Storage::disk('database')->get('csv/jabatans.csv');
        $lines = Csv::toArray($csv);

        foreach ($lines as $x) {
            $jabatan = new Jabatan(new \App\M_jabatan);
            
            $nama = $x[1];
            $ket = $x[2];
            $newJabatan = $jabatan->store($nama, $ket);
        }
    }
}
