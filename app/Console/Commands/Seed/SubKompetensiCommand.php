<?php

namespace App\Console\Commands\Seed;

use App\Models\Kompetensi;
use App\Models\SubKompetensi;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SubKompetensiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:subkompetensi';

    const namaKompetensi =['kognitif (pengetahuan)','psikomotorik (kemampuan)','afektif (sikap)','social interaction (interaksi sosial)'];
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $masterSubKompetensi = SubKompetensi::whereIn('kompetensi_id',[1,2,3,4])->get();
        $kompetensi = Kompetensi::all();
        foreach($kompetensi as $key => $val){
            foreach($masterSubKompetensi as $k => $v){
                SubKompetensi::updateOrInsert(
                    ['kompetensi_id'=>$val->id,'nama_sub_kompetensi'=>$v->nama_sub_kompetensi],
                    ['skor_penilaian'=>$v->skor_penilaian,'uuid'=> Str::uuid()]
                );
            }
        }


    }
}
