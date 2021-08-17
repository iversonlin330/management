<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Forgot extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	
	public $data;
	 
    public function __construct($data)
    {
        //
		$this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
		
		return $this->view('mails.forgot',compact('data'))
			->subject('「PIRLS數位閱讀學習平台」密碼重設信件');
    }
}
