<?php

use App\Municipio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \League\Csv\Exception
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('municipios')->truncate();

        $csv = Reader::createFromPath(database_path('seeds/Municipios.csv'), 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter(';');
        $records = $csv->getRecords();

        foreach ($records as $offset => $record) {
            DB::table('municipios')->insert([
                'id' => $record['id'],
                'Nombre' => $record['Nombre'],
                'Departamento' => $record['Departamento'],
                'Estado' => $record['Estado'],
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }


    }
}
