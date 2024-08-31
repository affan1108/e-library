<?php

use Illuminate\Database\Seeder;
use App\Libraries\Csv;

// Repositories
use App\Repositories\Department;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('m_departments')->truncate();

        $csv = \Storage::disk('database')->get('csv/departments.csv');
        $lines = Csv::toArray($csv);

        foreach ($lines as $x) {
            $department = new Department(new \App\M_department);
            
            $nama = $x[2];
            $ket = $x[3];
            $newDepartment = $department->store($nama, $ket);
        }
    }
}
