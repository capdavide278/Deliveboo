<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeadToLead extends Mailable
{
    use Queueable, SerializesModels;

    private $lead;

    public function __construct(Lead $_lead)
    {
        $this->lead = $_lead;
    }


    public function build()
    {
        return $this->view('mails.leadToLead', [
            'lead' => $this->lead,
        ]);
    }
}
