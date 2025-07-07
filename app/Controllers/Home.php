<?php

namespace App\Controllers;

use App\Models\ProductModel;    
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\DiskonModel;

class Home extends BaseController
{
    protected $product;
    protected $transaction;
    protected $transaction_detail;

    function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new ProductModel();
        $this->transaction = new TransactionModel;
        $this->transaction_detail = new TransactionDetailModel;
    }

    public function index(): string 
    {
        $product = $this->product->findAll();
        $data['product'] = $product;

        return view('v_home', $data);
    }

    public function profile()
{
    $username = session()->get('username');
    $data['username'] = $username;

    $buy = $this->transaction->where('username', $username)->findAll();
    $data['buy'] = $buy;

    $product = [];

    if (!empty($buy)) {
        foreach ($buy as $item) {
            $detail = $this->transaction_detail->select('transaction_detail.*, product.nama, product.harga, product.foto')->join('product', 'transaction_detail.product_id=product.id')->where('transaction_id', $item['id'])->findAll();

            if (!empty($detail)) {
                $product[$item['id']] = $detail;
            }
        }
    }

    $data['product'] = $product;

    return view('v_profile', $data);
}

    public function login()
{
    // proses validasi login seperti biasa
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // ... proses autentikasi user
    // misalnya sudah berhasil login

    // Cari diskon berdasarkan tanggal hari ini
    $diskonModel = new DiskonModel();
    $tanggalHariIni = date('Y-m-d');

    $diskon = $diskonModel->where('tanggal', $tanggalHariIni)->first();

    if ($diskon) {
        session()->set('diskon', $diskon['nominal']);
    } else {
        session()->remove('diskon');
    }

    return redirect()->to('/dashboard');
}
}
