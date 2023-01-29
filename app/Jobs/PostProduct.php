<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class PostProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $input;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // input data for product
        $reqProduct = [
            'nama_product' => $this->input->nama_product,
            'merk' => $this->input->merk,
            'kapasitas_cc' => $this->input->kapasitas_cc,
            'odometer' => $this->input->odometer,
            'nomor_mesin' => $this->input->nomor_mesin,
            'jenis' => $this->input->jenis,
            'bahan_bakar' => $this->input->bahan_bakar,
            'warna' => $this->input->warna,
            'nomor_rangka' => $this->input->nomor_rangka,
            'merk' => $this->input->merk,
        ];
        $requestProduct = Request::create('/api/product', 'POST', $reqProduct);
        $responseProduct = Route::dispatch($requestProduct);
        $dataProduct = json_decode($responseProduct->getContent());
        return $dataProduct;
    }
}
