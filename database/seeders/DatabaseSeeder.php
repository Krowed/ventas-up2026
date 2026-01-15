<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(WarehouseSeeder::class);
        $this->call(CashSeeder::class);
        $this->call(SerieSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(TypeDocumentSeeder::class);
        $this->call(PayModeSeeder::class);
        $this->call(IgvTypeAffectionSeeder::class);
        $this->call(IdentityDocumentTypeSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CreditNoteTypeSeeder::class);
        $this->call(DebitNoteTypeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BusineSeeder::class);
    }
}
