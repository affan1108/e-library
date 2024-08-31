<?php

use Illuminate\Database\Seeder;
// Repositories
use App\Repositories\AreaKerja;

class AreaKerjasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('m_area_kerjas')->truncate();

        $areaKerjaPabrik = new AreaKerja(new \App\M_area_kerja);
        $areaKerjaPabrik->store(1, 'Pabrik', 'Pabrik');

        $areaKerjaCabang = new AreaKerja(new \App\M_area_kerja);
        $areaKerjaCabang->store(2, 'HO / Cabang', 'HO / Cabang');
    }
}