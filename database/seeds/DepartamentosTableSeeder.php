<?php

use App\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class DepartamentosTableSeeder extends Seeder
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
        DB::table('departamentos')->truncate();

        $csv = Reader::createFromPath(database_path('seeds/Departamentos.csv'), 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter(';');
        $records = $csv->getRecords();

        foreach ($records as $offset => $record) {
            DB::table('departamentos')->insert([
                'id' => $record['id'],
                'Nombre' => $record['Nombre'],
                'Region' => $record['Region'],
                'Estado' => $record['Estado'],
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

    }
}
