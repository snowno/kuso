<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
//use Illuminate\Contracts\Mail\Mailer;
use Mail;

class SendRegEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mail $mail)
    {
        $user = $this->user;
        if($user){
            $email = $this->user->email;
            $name = $this->user->name;
            $uid = $this->user->id;
            $mes = 'wellcome to my space!';
        }else{
            $email = env('EMAILTEST2');
            $name = 'this is name';
            $uid = 2;
            $mes = '这是测试';
        }

        $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>'2','mes' =>$mes];
        Mail::send('activemail', $data, function($message) use($data)
        {
            $message->to($data['email'], $data['name'])->subject($data['mes']);
        });
//        $mail->send('activemail',['user'=>$user],function($mes) use ($user){
//            $mes->to($user->email)->subject('testtest');
//        });
    }
}
