<?php

namespace App\Console\Commands\Jsonplaceholder;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportJsonPostsCommand extends Command
{

    protected $signature = 'import:jsonposts';


    protected $description = 'Get posts by jsonplaceholder API';


    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents());
        foreach($data as $item)
        {
            dump('ID: '.$item->id."\nContent: ". $item->body);
        }
    }
}
