<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_kecamatan = [
            'Babat',
            'Bluluk',
            'Brondong',
            'Deket',
            'Glagah',
            'Kalitengah',
            'Karangbinangun',
            'Karanggeneng',
            'Kedungpring',
            'Kembangbahu',
            'Lamongan',
            'Laren',
            'Maduran',
            'Mantup',
            'Modo',
            'Ngimbang',
            'Paciran',
            'Pucuk',
            'Sambeng',
            'Sarirejo',
            'Sekaran',
            'Sukodadi',
            'Sukorame',
            'Tikung',
            'Turi'
        ];
        foreach($list_kecamatan as $kecamatan){
            DB::table('kecamatan')->insert([
                'nama_kecamatan'=>$kecamatan,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
