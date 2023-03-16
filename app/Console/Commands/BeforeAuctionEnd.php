<?php

namespace App\Console\Commands;

use App\Models\Auction;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BeforeAuctionEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auction:bfend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auctione ended in 1 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = Auction::with(['auctioneer.user', 'offer', 'product'])->where('exp_date', 'between', Carbon::now())->where('status', 'LIKE', 1);
    }
}
