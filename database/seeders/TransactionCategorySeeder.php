<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_categories')->insert([
            [
                'name' => 'Penjualan',
                'type' => 'income',
                'description' => 'Uang yang masuk dari transaksi jual beli barang jadi',
                'cashless' => 1,
            ],
            [
                'name' => 'Pendapatan Jasa',
                'type' => 'income',
                'description' => 'Uang yang masuk dari kegiatan bisnis yang berbentuk jasa (service)',
                'cashless' => 1,
            ],
            [
                'name' => 'Komisi/Fee',
                'type' => 'income',
                'description' => 'Uang yang di dapat atas peran sebagai pihak ketiga yang menghubungkan penjual dan pembeli. Contoh: Dropshipping',
                'cashless' => 1,
            ],
            [
                'name' => 'Pendapatan Lain-lain',
                'type' => 'income',
                'description' => 'Penerimaan tidak rutin dari kegiatan di luar aktivitas bisnis',
                'cashless' => 1,
            ],
            [
                'name' => 'Penerimaan Piutang',
                'type' => 'income',
                'description' => 'Pemasukan yang dihasilkan dari penagihan utang',
                'cashless' => 0,
            ],
            [
                'name' => 'Modal',
                'type' => 'income',
                'description' => 'Penambahan dana dari investor/pemilik usaha untuk meningkatkan kapasitas perusahaan',
                'cashless' => 0,
            ],
            [
                'name' => 'Hibah',
                'type' => 'income',
                'description' => 'Pemberian dari pihak ketiga sebagai penambahan modal tanpa mengharapkan pengembalian tertentu',
                'cashless' => 0,
            ],
            [
                'name' => 'Pinjaman',
                'type' => 'income',
                'description' => 'Penambahan dana dari pemberi pinjaman yang harus di kembalikan dalam jangka waktu tertentu dengan tujuan untuk pengembangan usaha',
                'cashless' => 0,
            ],
            [
                'name' => 'Pembelian Persediaan',
                'type' => 'expense',
                'description' => 'Pembelian barang yang akan di jual kembali',
                'cashless' => 1,
            ],
            [
                'name' => 'Pembelian Bahan Baku',
                'type' => 'expense',
                'description' => 'Pembeliaan bahan dasar yang akan diolah menjadi barang siap jual',
                'cashless' => 1,
            ],
            [
                'name' => 'Biaya Kemasan',
                'type' => 'expense',
                'description' => 'Dana yang digunakan untuk mengemas barang dagangan sebelum di terima pembeli',
                'cashless' => 1,
            ],
            [
                'name' => 'Beban Ongkos Kirim',
                'type' => 'expense',
                'description' => 'Pembayaran jasa pengiriman barang',
                'cashless' => 1,
            ],
            [
                'name' => 'Beban Iklan/Promosi',
                'type' => 'expense',
                'description' => 'Pembayaran jasa iklan untuk promosi atau pemasaran produk',
                'cashless' => 1,
            ],
            [
                'name' => 'Beban Gaji Pegawai',
                'type' => 'expense',
                'description' => 'Pembayaran upah pegawai/karyawan',
                'cashless' => 1,
            ],
            [
                'name' => 'Beban Gedung',
                'type' => 'expense',
                'description' => 'Pembayaran sewa gedung untuk aktivitas bisnis',
                'cashless' => 1,
            ],
            [
                'name' => 'Beban Lain-lain',
                'type' => 'expense',
                'description' => 'Pengeluaran tidak rutin yang berkaitan dengan aktivitas bisnis',
                'cashless' => 1,
            ],
            [
                'name' => 'Perlengkapan',
                'type' => 'expense',
                'description' => 'Pembelian barang untuk operasional perusahaan yang sifatnya cepat habis',
                'cashless' => 1,
            ],
            [
                'name' => 'Peralatan',
                'type' => 'expense',
                'description' => 'Pembelian alat untuk menunjang kegiatan bisnis yang sifatnya tahan lama',
                'cashless' => 1,
            ],
            [
                'name' => 'Investasi',
                'type' => 'expense',
                'description' => 'Pengeluaran dana secara tunai untuk mendapatkan keuntungan di masa depan',
                'cashless' => 0,
            ],
            [
                'name' => 'Pembayaran Utang',
                'type' => 'expense',
                'description' => 'Pengeluaran dana untuk membayar utang',
                'cashless' => 0,
            ],
            [
                'name' => 'Pengeluaran Pribadi',
                'type' => 'expense',
                'description' => 'Pengeluaran untuk keperluan pribadi yang tidak berkaitan dengan kegiatan bisnis',
                'cashless' => 0,
            ],
            [
                'name' => 'Sedekah',
                'type' => 'expense',
                'description' => 'Pengeluaran yang diberikan pada pihak lain tanpa mengharapkan pengembalian tertentu',
                'cashless' => 0,
            ],
        ]);
    }
}
