<?php

namespace App\Console\Commands;

use App\Models\Auction;
use App\Models\Invoice;
use App\Notifications\EndLoserNotification;
use App\Notifications\EndWinnerNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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
        $query = Auction::with(['auctioneer.user', 'offer','product'])->where('exp_date', '<=', Carbon::now())->where('status', 'LIKE', 1);
        $data = $query->get();

        foreach ($data as $auction) {
            if (count($auction->auctioneer) && count($auction->offer)) {
                // Jika Auction Memiliki Offer

                // Cari Offer paling tinggi
                $bestOffer = collect($auction->offer)->sortByDesc('offer')->first()->load('auctioneer.user');

                foreach ($auction->auctioneer as $auctioneer) {
                    if ($auctioneer->auctioneer_id === $bestOffer->id_auctioneer) {
                        Notification::send($auctioneer->user,new EndWinnerNotification($auction,$bestOffer));

                    } else {
                        Notification::send($auctioneer->user,new EndLoserNotification($auction,$auctioneer));

                    }
                }

                // Update dan Create Invoice
                Http::post('http://127.0.0.1:8000/api/auction/' . $auction->token, ['status' => 0, 'id_winner' => $bestOffer->id_auctioneer, '_method' => 'PUT']);
                Http::post('http://127.0.0.1:8000/api/invoice', ['id_auctioneer' => $bestOffer->id_auctioneer, 'invoice' => $bestOffer->offer]);


            } else {
                // Jika Tidak memiliki auctioneer
                Http::post('http://127.0.0.1:8000/api/auction/' . $auction->token, ['status' => 0, '_method' => 'PUT']);
            }
        }
    }
}
