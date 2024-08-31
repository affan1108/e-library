<?php

use Illuminate\Database\Seeder;

class KategoriBeritasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('m_kategori_beritas')->truncate();

        DB::table('m_kategori_beritas')->insert([
            'id' => 1,
            'nama' => 'Olahraga',
            'ket' => 'Olahraga'
    	]);

    	DB::table('m_kategori_beritas')->insert([
            'id' => 2,
            'nama' => 'Politik',
            'ket' => 'Politik'
    	]);
    }
}
