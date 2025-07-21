<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = [1];

        $incomeCategories = [
            'Salary',
            'Bonus',
            'Freelance',
            'Dividends',
            'Business Profit',
            'Investments'
        ];

        $expenseCategories = [
            'Housing',
            'Transportation',
            'Food & Beverages',
            'Health',
            'Education',
            'Shopping',
            'Entertainment',
            'Utilities'
        ];

        $incomeDescriptions = [
            'Gaji pokok bulanan',
            'Bonus tahunan',
            'Pendapatan proyek freelance',
            'Dividen saham perusahaan',
            'Laba usaha toko online',
            'Pengembalian investasi'
        ];

        $expenseDescriptions = [
            'Bayar sewa rumah',
            'Bensin dan perawatan mobil',
            'Belanja bulanan keluarga',
            'Asuransi & pengobatan',
            'Biaya sekolah/kuliah',
            'Belanja elektronik',
            'Liburan & hiburan keluarga',
            'Listrik, air, internet'
        ];

        foreach ($userIds as $userId) {
            foreach (range(2019, 2025) as $year) {
                foreach (range(1, 12) as $month) {

                    // Tambahkan pemasukan dan pengeluaran wajib tanggal 1 & 21 untuk bulan Jan–Juli
                    if ($month >= 1 && $month <= 7) {
                        foreach ([1, 21] as $day) {
                            $date = Carbon::create($year, $month, $day);

                            // Income
                            DB::table('transactions')->insert([
                                'user_id' => $userId,
                                'description' => $incomeDescriptions[array_rand($incomeDescriptions)],
                                'amount' => number_format(rand(1500000, 10000000), 2, '.', ''),
                                'type' => 'income',
                                'transaction_date' => $date->format('Y-m-d'),
                                'category' => $incomeCategories[array_rand($incomeCategories)],
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);

                            // Expense
                            DB::table('transactions')->insert([
                                'user_id' => $userId,
                                'description' => $expenseDescriptions[array_rand($expenseDescriptions)],
                                'amount' => number_format(rand(1500000, 8000000), 2, '.', ''),
                                'type' => 'expense',
                                'transaction_date' => $date->format('Y-m-d'),
                                'category' => $expenseCategories[array_rand($expenseCategories)],
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }

                    // Transaksi acak tambahan
                    $transactionsPerMonth = rand(4, 8);
                    for ($i = 0; $i < $transactionsPerMonth; $i++) {
                        $date = Carbon::create($year, $month, rand(1, 28));
                        $isIncome = rand(0, 1) === 1;

                        DB::table('transactions')->insert([
                            'user_id' => $userId,
                            'description' => $isIncome
                                ? $incomeDescriptions[array_rand($incomeDescriptions)]
                                : $expenseDescriptions[array_rand($expenseDescriptions)],
                            'amount' => number_format(
                                $isIncome ? rand(10000000, 80000000) : rand(5000000, 60000000),
                                2,
                                '.',
                                ''
                            ),
                            'type' => $isIncome ? 'income' : 'expense',
                            'transaction_date' => $date->format('Y-m-d'),
                            'category' => $isIncome
                                ? $incomeCategories[array_rand($incomeCategories)]
                                : $expenseCategories[array_rand($expenseCategories)],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
