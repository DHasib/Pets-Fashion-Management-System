<?php

namespace App\Mail;

use Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseSuccessfuly extends Mailable
{
    use Queueable, SerializesModels;

    public $pets;
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pet, $product)
    {
        $this->pets     = $pet;
        $this->products = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
        return $this->view('emails.purchased')->with('pets',      $this->pets)
                                              ->with('products',   $this->products);
    }
}
