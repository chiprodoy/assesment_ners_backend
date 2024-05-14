<?php

namespace App\Console\Commands\Seed;

use App\Models\Asesmen;
use App\Models\Kompetensi;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class KompetensiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:kompetensi';

    //final $kompetensi = [''kognitif (pengetahuan)','psikomotorik (kemampuan)','afektif (sikap)','social interaction (interaksi sosial)'];

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
        $kompetensi = Kompetensi::where('asesmen_id',1)->get();
        $asesmen = Asesmen::has('kompetensis','<',4)->get();
        foreach($asesmen as $key => $val){
            foreach($kompetensi as $k => $v)
            Kompetensi::updateOrInsert(
                ['asesmen_id'=>$val->id,'nama_kompetensi'=>$v->nama_kompetensi],
                ['persentase'=>$v->persentase,'uuid'=>Str::uuid()]
            );
        }

        //
    }
}
