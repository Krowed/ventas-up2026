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
    public function index()
    {
        return view('products.index');
    }

    public function get()
    {
        // Usamos Eager Loading para evitar el problema N+1 con marcas y categorías
        $products = Product::query()
            ->select("products.*", "units.codigo as codigo_unidad", "categories.descripcion as categoria", "brands.descripcion as marca")
            ->join("units", "products.idunidad", "units.id")
            ->leftJoin("categories", "products.idcategoria", "categories.id")
            ->leftJoin("brands", "products.idmarca", "brands.id")
            ->orderBy("products.id", "DESC");

        return Datatables()
            ->of($products)
            // Columna Combinada: Imagen + Nombre
            ->editColumn('descripcion', function ($product) {
                $imagePath = (empty($product->imagen))
                    ? asset("files/empty-product.png")
                    : asset("files/products/" . $product->imagen);

                return '
                    <div class="d-flex align-items-center">
                        <a href="javascript:void(0);" class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                            <img src="' . $imagePath . '" class="rounded-circle" alt="img" style="object-fit: cover;">
                        </a>
                        <div>
                            <h6 class="fs-14 fw-medium mb-0">
                                <a href="javascript:void(0);" class="text-dark">' . $product->descripcion . '</a>
                            </h6>
                        </div>
                    </div>';
            })
            // Columna de Acciones estilo Plantilla
            ->addColumn('acciones', function ($product) {
                return '
                    <div class="action-item">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="isax isax-more text-dark"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center btn-view" data-id="' . $product->id . '">
                                    <i class="isax isax-eye me-2"></i>Ver detalle
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center btn-edit" data-id="' . $product->id . '">
                                    <i class="isax isax-edit me-2"></i>Actualizar
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center btn-confirm text-danger" data-id="' . $product->id . '">
                                    <i class="isax isax-trash me-2"></i>Eliminar
                                </a>
                            </li>
                        </ul>
                    </div>';
            })
            ->rawColumns(['descripcion', 'acciones'])
            ->toJson();
    }
}
