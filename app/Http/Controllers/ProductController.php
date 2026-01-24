<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Business;
use App\Models\Category;
use App\Exports\DownloadProduct;
use App\Imports\ProductImport;
use App\Models\IgvTypeAffection;
use App\Models\Product;
use App\Models\StockProduct;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    //
}
