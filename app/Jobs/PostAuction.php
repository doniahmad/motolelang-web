<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;

class PostAuction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $input;
    protected $product_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($input, $product_id)
    {
        $this->input = $input;
        $this->product_id = $product_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reqAuction = [
            'id_product' => $this->product_id,
            'exp_date' => $this->input
        ];

        Request::create('/api/auction', 'POST', $reqAuction);
    }
}
