<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class SwooleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        //
    }

    public function fire()
    {
        $arg = $this->argument('action');
        switch($arg){
            case 'start':
                $this->info('swoole started!');
                $this->start();
                break;
            case 'stop':
                $this->info('swoole stoped');
                break;
            case 'restart':
                $this->info('swoole restarted');
                break;
        }

    }


    public function start(){
        $this->server = new swoole("0.0.0.0",9501);
        $this->server->set([
            'worker_num' => 3,
            'daemonize' => false,
            'max_request' => 1000,
            'dispatch_mode' => 2,
            'debug_mode' => 1,
        ]);

        $handler = App::make('handler\SwooleHandler');
        $this->server->on('Start',[$handler,'onStart']);
        $this->server->on('Connect',[$handler,'onConnect']);
        $this->server->on('Receive',[$handler,'onReceive']);
        $this->server->on('Close',[$handler,'onClose']);

        $this->server->start();
    }

    protected function getArguments()
    {
        return array(
            array('action',InputArgument::REQUIRED,'start|stop|restart'),
        );
    }
}
