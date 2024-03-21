<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();

        for ($i=0; $i < 30; $i++) {

                Buku::create(
                    [
                        'judul'=>$faker->sentence(),
                        'pengarang'=>$faker->name('id_ID'),
                        'tanggal_publikasi'=>$faker->date()
                    ]
                    );
            }
    }
}
