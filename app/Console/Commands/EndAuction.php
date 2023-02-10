<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EndAuction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auction:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auction Ended';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return DB::table('auctions')->where('exp_date', '<=', Carbon::now())->update(['status' => 0]);
    }
}
