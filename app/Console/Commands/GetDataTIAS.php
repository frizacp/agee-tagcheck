<?php

namespace App\Console\Commands;

use App\Models\TagResult;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDataTIAS extends Command
{
    protected $signature = 'get:tias';
    

    protected $description = 'Get data from TIAS';

    public function handle()
    {
        $race = env('RACE_CODE', 'DEFAULT');
        $url = "https://pickmyrace.frizacahya.com/getdata_tagcheck?race={$race}";
        $data   =   Http::get($url)->json();

        foreach ($data['data'] as $value) {
            TagResult::getTagCheck($value);
        }

        $this->info('Data has been fetched from TIAS');
    }
}
