<?php

use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_fasilitas = [
            'Jalan',
            'Taman',
            'Penerangan jalan'
        ];
        foreach($list_fasilitas as $fasilitas){
            DB::table('fasilitas')->insert([
                'nama_fasilitas'=>$fasilitas,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
