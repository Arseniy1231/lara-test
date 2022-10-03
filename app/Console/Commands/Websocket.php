<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class Websocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда для запуска сервера';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
   
    public function handle()
    {
        define('APP_PORT', 8889);

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new \App\MapConnection\Websocket()
                )
            ),APP_PORT
        );
    
        $server->run();
    }
}
