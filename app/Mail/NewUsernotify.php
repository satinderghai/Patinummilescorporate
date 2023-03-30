<?php
namespace App\Mail;

 

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

 

class NewUsernotify extends Mailable

{

    use Queueable, SerializesModels;

    /**

     * Create a new message instance.

     *

     * @return void

     */

    public $contact_data;

    public function __construct($contact_data)

    {

        $this->contact_data = $contact_data;

    }

 

    /**

     * Build the message.

     *

     * @return $this

     */

    public function build()

    {

        return $this->view('email.newUser')->with('data', $this->contact_data);

    }

}