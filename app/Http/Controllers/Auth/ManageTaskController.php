<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupplierProduct;
use App\Product;
use App\Supplier;
use App\Containers;

use App\CartContainer;
use App\CartSupplierProduct;

use App\Pembelian;
use DataTables;
use TimezoneAccessor;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #Jadi akan ditampilkan cart di halaman pembelian
        #Halaman pembelian akan mengirim ke db pembelian jadi nanti ada 3 -> 1. Cart Container. 2. Cart BarangSupplier. 3. List Pembelian
        #Pembelian [id,list_id_container,list_barang_supplier,status,actions]    List probably akan jadi comma seperated values dari id yang dipake, status 
        #
        # $supplierproducts = SupplierProduct::all();
        $cart_container = CartContainer::all();
        $cart_supplier_product = CartSupplierProduct::all();
        $container = Containers::orderBy('nama_container','ASC')
            ->get()
            ->pluck('nama_container','id');
        $supplier_products = SupplierProduct::orderBy('nama','ASC')
            ->get()
            ->pluck('nama','id');
        $data_pembelian = Pembelian::all();
        return view('pembelian.index', compact('cart_container','cart_supplier_product','container','supplier_products','data_pembelian'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tableType = $request->input('table_type');
 
        if ($tableType === 'container') {
            $this->validate($request, [
            'id_container'     => 'required',
            'jumlah'            => 'required',
            ]);
            CartContainer::create($request->all());
        }
        elseif ($tableType == 'barang_supplier') {
            $this->validate($request, [
            'id_barang_supplier'     => 'required',
            'jumlah'            => 'required',
            ]);
            CartSupplierProduct::create($request->all());
        }
        else{
            dd("WEFAIL");
        }
        
        return redirect()->route('pembelian.index')->with('success', 'Products In Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembelian = Pembelian::find($id);
        return $pembelian;
    }

    # Untuk BarangSupplier Cart Edit 
    public function editBarangSupplier($id)
    {
        $product_masuk = CartSupplierProduct::find($id);
        return $product_masuk;
    }
    public function editContainer($id)
    {
        $product_masuk = CartContainer::find($id);
        return $product_masuk;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tableType = $request->input('table_type');

        if ($tableType === 'container') {
            $this->validate($request, [
            'id_container'     => 'required',
            'jumlah'            => 'required',
            ]);
            $product_masuk = CartContainer::findOrFail($id);
            $product_masuk->update($request->all());
        }
        elseif ($tableType == 'barang_supplier') {
            $this->validate($request, [
            'id_barang_supplier'     => 'required',
            'jumlah'            => 'required',
            ]);
            $product_masuk = CartSupplierProduct::findOrFail($id);
            $product_masuk->update($request->all());
        }
        elseif ($tableType == 'pembelian') {
            $this->validate($request, [
            'list_id_container'     => 'required',
            'list_id_barang_supplier'            => 'required',
            'status'            => 'required',
            ]);
            $product_masuk = Pembelian::findOrFail($id);
            #ADD IF status = 2 count = 1 DISINI
            #check if status lama bandingkan dengan baru if 0 -> 1 then update qty of barang, else nochange
            
            if ($request->input('status') == 2 && $product_masuk->status != 2) {
                // Parse the list_id_barang_supplier to get each barang_supplier ID
                $list_id_barang_supplier = explode(',', $product_masuk->list_id_barang_supplier);
                foreach ($list_id_barang_supplier as $supplierProductId) {
                    $supplierProduct = SupplierProduct::find($supplierProductId);
                    $product = Product::find($supplierProduct->product_id);
                    $product->qty += 1;
                    $product->save();
                }
            }
            $product_masuk->update($request->all());
        }
        return redirect()->route('pembelian.index')->with('success', 'Item Updated Successfully');
    }


    // Untuk Menambahkan data ke Tabel Pembelian
    public function addToPembelian()
    {
        $container_ids = "";
        $barangSupplier_ids = "";
        $containerCartData = CartContainer::all();
        $cartBarangSupplierData = CartSupplierProduct::all();
        // dd($containerCartData);
        foreach ($containerCartData as $item) {
            for ($i = 0; $i < $item->jumlah; $i++) {
                $container_ids .= $item->id_container . ",";
            }
        }
        $container_ids = rtrim($container_ids, ",");

        foreach ($cartBarangSupplierData as $item) {
            for ($i = 0; $i < $item->jumlah; $i++) {
                $barangSupplier_ids .= $item->id_barang_supplier . ",";
            }
        }
        $barangSupplier_ids = rtrim($barangSupplier_ids, ",");
       
        Pembelian::create([
            'list_id_container' => $container_ids,
            'list_id_barang_supplier' => $barangSupplier_ids,
            'status' => 1,  // Status 1 -> belum diconfirm, 0 -> Batal, 2 -> Confirmed
            'route' => '[]'
        ]);
        return redirect()->route('pembelian.index')->with('success', 'Pembelian Added Successfully');
    }

    public function getRoutePembelian($id)
    {
        $pembelian = Pembelian::find($id);
        $list_id_container = explode(',', $pembelian->list_id_container);
        $list_id_barang_supplier = explode(',', $pembelian->list_id_barang_supplier);

        $containers = [];
        $uniqueSuppliers = [];
        $supplierProducts = [];
        $efisiensiBensinArray = [];

        foreach ($list_id_container as $containerId) {
            $container = Containers::find($containerId);
            if ($container) {
                $containers[] = [
                    $container->nama_container,
                    $container->panjang_container,
                    $container->lebar_container,
                    $container->tinggi_container,
                    $container->kapasitas_container,  
                    $container->efisiensi_bensin
                ];
                $efisiensi_bensin = (float) $container->efisiensi_bensin;
                $efisiensiBensinArray[$container->nama_container] = $efisiensi_bensin;
            }

        }
        $containerString = ''; 
        $containerEfBensin = [];
        foreach ($containers as $container) {
            $nama = $container[0];
            $panjang = $container[1];
            $lebar = $container[2];
            $tinggi = $container[3];
            $kapasitas = $container[4];

            $containerdata = "[$nama,$panjang,$lebar,$tinggi,$kapasitas]";
            $containerString .= $containerdata . ';';
        }
        $containerString = rtrim($containerString, ';');

        // Get Data barang supplier dan unique supplier
        // Tiap barang memiliki format [id,p,l,t,b,id_supplier,harga]
        // p,l,t -> jadikan volume dan id_supplier digunakan dalam reordertsp.py
        foreach ($list_id_barang_supplier as $supplierProductId) {
            $supplierProduct = SupplierProduct::find($supplierProductId);

            if ($supplierProduct) {
                $product = Product::find($supplierProduct->product_id);
                $supplier = Supplier::find($supplierProduct->supplier_id);

                if (!isset($uniqueSuppliers[$supplier->id])) {
                    $uniqueSuppliers[$supplier->id] = [
                        $supplier->id,
                        $supplier->nama,
                        $supplier->latitude,
                        $supplier->longitude,
                    ];
                }
                
                $supplierProducts[] = [
                    $supplierProduct->nama,
                    $product->panjang_barang,
                    $product->lebar_barang,
                    $product->tinggi_barang,
                    $product->berat_barang,
                    $supplier->id,
                    $supplierProduct->harga,
                ];
            }
        }
        // dd($uniqueSuppliers);
        ksort($uniqueSuppliers);
        // dd($uniqueSuppliers);
        // Karena data perlu dikirim ke python dalam format string melalui JSON encode
        // Ubah ke format '[data1,data2] ; [data3,data4]' -> Seperated by ; dan ,
        // Unique Suppliers Formatter
        $supplierString = ''; 
        foreach ($uniqueSuppliers as $supplier) {
            $id = $supplier[0];
            $nama = $supplier[1];
            $latitude = $supplier[2];
            $longitude = $supplier[3];

            $supplierData = "[$id,$nama,$latitude,$longitude]";
            $supplierString .= $supplierData . ';';
        }
        $supplierString = rtrim($supplierString, ';');
        
        // Barang Supplier Formatter
        $supplierProductString = '';
        foreach ($supplierProducts as $supplierProduct) {
            $nama = $supplierProduct[0];
            $panjang_barang = $supplierProduct[1];
            $lebar_barang = $supplierProduct[2];
            $tinggi_barang = $supplierProduct[3];
            $volume_barang = $supplierProduct[1] * $supplierProduct[2] * $supplierProduct[3];
            $berat_barang = $supplierProduct[4];
            $id_supplier = $supplierProduct[5];
            $harga = $supplierProduct[6];

            $supplierProductData = "[$nama,$panjang_barang,$lebar_barang,$tinggi_barang,$volume_barang,$berat_barang,$id_supplier,$harga]";
            $supplierProductString .= $supplierProductData . ';';
        }
        $supplierProductString = rtrim($supplierProductString, ';');
        // dd(array_keys($uniqueSuppliers));
        // dd($uniqueSuppliers[6][1]);
        // dd($supplierString);
        $pythonScriptURL = 'C:\xamppMaxy\htdocs\InventoryMS-Laravel\public\python\testturntodist.py';
        $command = "python $pythonScriptURL \"$supplierString\" \"$supplierProductString\"";
        $optimalRoute = shell_exec($command);
        $optimalRoute = trim($optimalRoute);
        $optimalRoute = explode('--', $optimalRoute);
        // dd($optimalRoute);
        $average_dist = (float) $optimalRoute[0] /1000; #jadikan km;
        $average_dur  = (float) $optimalRoute[1];
        $optimal_dist = (float) $optimalRoute[2];
        $optimal_dur  = (float) $optimalRoute[3];
        $display      = $optimalRoute[4];
        $display   = explode(';', $display);

        $initialRoute = $display[0];
        $finalRoute = $display[count($display) - 1];
        $displayData = array_slice($display, 1, -1);
        $processedData = array_map(function($item) {
            return explode('++', $item);
        }, $displayData);
        // dd($processedData);

        $route        = $optimalRoute[5];
        
        // dd($routeString);
        // dd($optimalRoute);
        // dd($route);
        $pembelian->updated_at = \Carbon\Carbon::now();
        $pembelian->route = $route;
        $pembelian->save();

        foreach ($efisiensiBensinArray as $nama => $efisiensi_bensin) {
            $distDiff = $average_dist - $optimal_dist;
            $durDiff = $average_dur - $optimal_dur;
            $efficiencyDiff = ($average_dist - $optimal_dist) / $efisiensi_bensin;
            $efisiensiBensinArray[$nama] = [
                'efisiensi_bensin' => $efisiensi_bensin,
                'efficiency_diff' => $efficiencyDiff,
                'saved_cost' => (float) $efficiencyDiff * 10000,
                'dist_diff' => $distDiff,
                'dur_diff' => $durDiff,
            ];
        }
        return view('pembelian.reportrute', compact(
            'initialRoute', 'finalRoute', 'processedData', 'average_dist', 'average_dur', 'optimal_dist', 'optimal_dur', 'route','efisiensiBensinArray'
        ));
    }

    public function simulasiBagasi($id)
    {
        set_time_limit(3000); 
        $pembelian = Pembelian::find($id);
        $list_id_container = explode(',', $pembelian->list_id_container);
        $list_id_barang_supplier = explode(',', $pembelian->list_id_barang_supplier);
        $route = $pembelian->route;
        $containers = [];
        $uniqueSuppliers = [];
        $supplierProducts = [];

        #Untuk dapat data dari table containers dan diubah ke format string
        foreach ($list_id_container as $containerId) {
            $container = Containers::find($containerId);
            if ($container) {
                $containers[] = [
                    $container->nama_container,
                    $container->panjang_container,
                    $container->lebar_container,
                    $container->tinggi_container,
                    $container->kapasitas_container,    
                ];
            }
        }

        $containerString = ''; 
        foreach ($containers as $container) {
            $nama = $container[0];
            $panjang = $container[1];
            $lebar = $container[2];
            $tinggi = $container[3];
            $kapasitas = $container[4];

            $containerdata = "[$nama,$panjang,$lebar,$tinggi,$kapasitas]";
            $containerString .= $containerdata . ';';
        }
        $containerString = rtrim($containerString, ';');

        #Untuk dapat data dari tabel BarangSupllier dan supplier (unique) dan diubah ke format string
        foreach ($list_id_barang_supplier as $supplierProductId) {
            $supplierProduct = SupplierProduct::find($supplierProductId);

            if ($supplierProduct) {
                $product = Product::find($supplierProduct->product_id);
                $supplier = Supplier::find($supplierProduct->supplier_id);

                if (!isset($uniqueSuppliers[$supplier->id])) {
                    $uniqueSuppliers[$supplier->id] = [
                        $supplier->id,
                        $supplier->nama,
                        $supplier->latitude,
                        $supplier->longitude,
                    ];
                }
                
                $supplierProducts[] = [
                    $supplierProduct->nama,
                    $product->panjang_barang,
                    $product->lebar_barang,
                    $product->tinggi_barang,
                    $product->berat_barang,
                    $supplier->id,
                    $supplierProduct->harga,
                ];
            }
            
        }

        $supplierString = ''; 
        foreach ($uniqueSuppliers as $supplier) {
            $id = $supplier[0];
            $nama = $supplier[1];
            $latitude = $supplier[2];
            $longitude = $supplier[3];

            $supplierData = "[$id,$nama,$latitude,$longitude]";
            $supplierString .= $supplierData . ';';
        }
        $supplierString = rtrim($supplierString, ';');
        
        // Barang Supplier Formatter
        $supplierProductString = '';
        foreach ($supplierProducts as $supplierProduct) {
            $nama = $supplierProduct[0];
            $panjang_barang = $supplierProduct[1];
            $lebar_barang = $supplierProduct[2];
            $tinggi_barang = $supplierProduct[3];
            $volume_barang = $supplierProduct[1] * $supplierProduct[2] * $supplierProduct[3];
            $berat_barang = $supplierProduct[4];
            $id_supplier = $supplierProduct[5];
            $harga = $supplierProduct[6];

            $supplierProductData = "[$nama,$panjang_barang,$lebar_barang,$tinggi_barang,$volume_barang,$berat_barang,$id_supplier,$harga]";
            $supplierProductString .= $supplierProductData . ';';
        }
        $supplierProductString = rtrim($supplierProductString, ';');

        $pythonScriptURL = 'C:\xamppMaxy\htdocs\InventoryMS-Laravel\public\python\znogaboxes.py';
        // dd($containerString);
        // dd($supplierProductString);
        // dd($route);
        $command = "python $pythonScriptURL \"$containerString\" \"$supplierProductString\" \"$route\"";
        $output = shell_exec($command);
        return redirect()->route('pembelian.index');
        
    }

    public function showItems($id)
    {
        
        $pembelian = Pembelian::find($id);
        $list_id_container = explode(',', $pembelian->list_id_container);
        $list_id_barang_supplier = explode(',', $pembelian->list_id_barang_supplier);
        $containers = [];
        $supplierProducts = [];

        foreach ($list_id_container as $containerId) {
            $container = Containers::find($containerId);
            if ($container) {
                $containers[] = [
                    'id' => $container->id,
                    'nama_container' => $container->nama_container,
                ];
            }
        }

        foreach ($list_id_barang_supplier as $supplierProductId) {
            $supplierProduct = SupplierProduct::find($supplierProductId);
            if ($supplierProduct) {
                $product = Product::find($supplierProduct->product_id);
                $supplier = Supplier::find($supplierProduct->supplier_id);

                if ($product && $supplier) {
                    $supplierProducts[] = [
                        'product_id' => $product->id,
                        'product_name' => $product->nama,
                        'supplier_id' => $supplier->id,
                        'supplier_name' => $supplier->nama,
                        'price' => $supplierProduct->harga,
                    ];
                }
            }
        }

        return view('pembelian.showitems', [
            'containers' => $containers,
            'supplierProducts' => $supplierProducts,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Destroy Function
    public function destroy($id, Request $request)
    {
        $dataType = $request->input('type');

        if ($dataType === 'container') {
            CartContainer::destroy($id);
        } elseif ($dataType === 'barang_supplier') {
            CartSupplierProduct::destroy($id);
        } elseif ($dataType === 'pembelian') {
            Pembelian::destroy($id);
        } else {
            return response()->json(['error' => 'Invalid data type'], 400);
        }

        return redirect()->route('pembelian.index')->with('success', 'Item Deleted Successfully');
    }



    // API untuk mengisi tabel
    public function apiContainerCart(){
        $container = CartContainer::all();

        return Datatables::of($container)
            ->addColumn('nama_container', function ($container){
                return $container->container->nama_container;
            })
            ->addColumn('action', function($container){
                return '<a onclick="editFormContainer('. $container->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteDataContainer('. $container->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';

            })
            ->rawColumns(['container_name','action'])->make(true);

    }

    public function apiSupplierProductCart(){
        $supplierproduct = CartSupplierProduct::all();

        return Datatables::of($supplierproduct)
            ->addColumn('nama', function ($supplierproduct){
                return $supplierproduct->supplierproduct->nama;
            })

            
        
            ->addColumn('action', function($supplierproduct){
                return '<a onclick="editFormBarangSupplier('. $supplierproduct->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteDataBarangSupplier('. $supplierproduct->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';

            })
            ->rawColumns(['supplier_products_name','action'])->make(true);

    }

    public function apiPembelian(){
        $pembelian = Pembelian::all();

        return Datatables::of($pembelian)
            ->addColumn('status', function ($pembelian) {
                if ($pembelian->status == 0) {
                    return 'Dibatalkan';
                } elseif ($pembelian->status == 1) {
                    return 'Menunggu Konfirmasi';
                } elseif ($pembelian->status == 2) {
                    return 'Confirmed';
                } else {
                    return 'Unknown';
                }
            })

            ->addColumn('getRoute', function($pembelian) {
                return '<a href="' . route('getRoutePembelian', ['id' => $pembelian->id]) . '" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Get Route</a>' .
                    '<a href="' . route('simulate', ['id' => $pembelian->id]) . '" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Simulate</a>';
            })
            ->addColumn('action', function($pembelian){
                return '<a onclick="editFormPembelian('. $pembelian->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteDataPembelian('. $pembelian->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';

            })
            ->addColumn('details', function($pembelian){
                return '<a href="' . route('showItems', ['id' => $pembelian->id]) . '" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Show Items</a>';

            })
            ->rawColumns(['status', 'getRoute','details', 'action'])->make(true);

    }

    

}
