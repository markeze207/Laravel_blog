<?php

namespace App\Console\Commands\Jsonplaceholder;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportJsonCommentCommand extends Command
{

    protected $signature = 'import:jsoncomments {id?} {postId?}';

    protected $description = 'Get comments by jsonplaceholder API';

    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'comments', [
            'query' => [
                'postId' => $this->argument('postId'),
                'id' => $this->argument('id'),
            ]
        ]);
        $data = json_decode($response->getBody()->getContents());
        foreach($data as $item)
        {
            dump('ID post: '.$item->postId."\nID Comment: ".$item->id."\nContent: ". $item->body);
        }
    }
}
