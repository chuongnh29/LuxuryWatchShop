<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillStatus;
use App\ProductImages;
use DB;
use App\LoaiDay;
use App\LoaiVo;
use App\ProductType;
use App\TrangThaiSanPham;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class AdminController extends Controller
{
    public function getIndex(){

    	return view('pages.admin');
    }

    public function getProductManager(Request $request){
    	$type = $request->input('type','0');
    	$url = $request->fullUrl();
    	$loaiDay = LoaiDay::all();
    	$loaiVo = LoaiVo::all();
    	$trangThaiSanPham = TrangThaiSanPham::all();
    	$thuongHieu = DB::table('product_types')->groupBy('name_id')->get();
    	$gioiTinh = DB::table('product_types')->groupBy('type')->get();
    	// $paginateURL = $request;
    	$products = null;

    	$imagesName = [];
        $images = ProductImages::where('status_id',1)->get();
        foreach ($images as $image){
            $imagesName = array_add($imagesName,$image->product_id, $image->name_image);
        }
    	switch ($type){
            case 'timKiem':
                $products = $this->timKiemSanPham($request);
//                print_r($products);
//                return;
                break;
            default:
                break;
        }

    	if($products == null){
            $products = DB::table('products')
                ->leftJoin('product_types','products.type_id','=','product_types.id')
                ->leftJoin('strap_types','products.strap_id','=','strap_types.id')
                ->leftJoin('case_material','products.case_material_id','=','case_material.id')
                ->leftJoin('product_status','products.product_status_id','=','product_status.id')
                ->select('products.id','products.name', 'product_types.name as name_type',
                    'products.image', 'products.unit_price','products.promotion_price','products.description','product_status.product_status_name as product_status',
                    'strap_types.strap_name as loai_day', 'case_material.material_name as loai_vo', 'product_types.type as gender')->paginate(5);
    	}
    	$products->withPath($url);

    	return view('pages.adminProductManager',[
    		'products'=>$products,
    		'loaiVo' => $loaiVo,
            'loaiDay' => $loaiDay,
            'trangThaiSP' => $trangThaiSanPham,
            'thuongHieu' => $thuongHieu,
            'gioiTinh' => $gioiTinh,
            'imagesName'=>$imagesName
    	]);
    }

    public function getAddProduct($id = null){
        $loaiDay = LoaiDay::all();
        $loaiVo = LoaiVo::all();
        $trangThaiSanPham = TrangThaiSanPham::all();
        $thuongHieu = DB::table('product_types')->groupBy('name_id')->get();
        $gioiTinh = DB::table('product_types')->groupBy('type')->get();
        if($id == null){

            return view('pages.addProduct',[
                'loaiDay'=>$loaiDay,
                'loaiVo'=>$loaiVo,
                'trangThaiSP'=>$trangThaiSanPham,
                'thuongHieu'=>$thuongHieu,
                'gioiTinh'=>$gioiTinh,
                'type'=>'add'
            ]);
        } else {
            $product = DB::table('products')
                ->leftJoin('product_types','products.type_id','=','product_types.id')
                ->leftJoin('strap_types','products.strap_id','=','strap_types.id')
                ->leftJoin('case_material','products.case_material_id','=','case_material.id')
                ->leftJoin('product_status','products.product_status_id','=','product_status.id')
                ->select('products.id','products.name', 'products.type_id',
                    'products.image', 'products.unit_price','products.promotion_price','products.description','products.product_status_id',
                    'products.strap_id', 'products.case_material_id', 'product_types.type as gender')
                ->where('products.id', (int) $id)
                ->first();
            $anhDaiDien = ProductImages::where([['product_id','=',(int) $id],['status_id','=', 1]])->first();
            return view('pages.editProduct',[
                'loaiDay'=>$loaiDay,
                'loaiVo'=>$loaiVo,
                'trangThaiSP'=>$trangThaiSanPham,
                'thuongHieu'=>$thuongHieu,
                'gioiTinh'=>$gioiTinh,
                'product'=>$product,
                'type'=>'edit',
                'anhDaiDien'=>$anhDaiDien
            ]);
        }
    }

    public function timKiemSanPham($request){
        $dieuKienTim = [];
        $tenCanTim = $request->input('textSearch');
        if($tenCanTim != ''){
            $dieuKienTim[] = ['products.name','like','%'.$tenCanTim.'%'];
        }
        $thuongHieu = $request->input('thuongHieu');
        if($thuongHieu != 'none'){
            $dieuKienTim[] = ['product_types.id','=', $thuongHieu];
        }
        $gioiTinh = $request->input('gioiTinh', null);
        if($gioiTinh != 'none'){
            $dieuKienTim[] = ['product_types.type','=', $gioiTinh];
        }
        $loaiDay = $request->input('loaiDay');
        if($loaiDay != 'none'){
            $dieuKienTim[] = ['strap_types.id','=', $loaiDay];
        }
        $loaiVo = $request->input('loaiVo');
        if($loaiVo != 'none'){
            $dieuKienTim[] = ['case_material.id','=', $loaiVo];
        }
        $trangThai = $request->input('trangThaiSP');
        if($trangThai != 'none'){
            $dieuKienTim[] = ['product_status.id','=', $trangThai];
        }

        $products = DB::table('products')
            ->leftJoin('product_types','products.type_id','=','product_types.id')
            ->leftJoin('strap_types','products.strap_id','=','strap_types.id')
            ->leftJoin('case_material','products.case_material_id','=','case_material.id')
            ->leftJoin('product_status','products.product_status_id','=','product_status.id')
            ->select('products.id','products.name', 'product_types.name as name_type',
                'products.image', 'products.unit_price','products.promotion_price','products.description','product_status.product_status_name as product_status',
                'strap_types.strap_name as loai_day', 'case_material.material_name as loai_vo', 'product_types.type as gender')
            ->where($dieuKienTim)
            ->paginate(5);

        return $products;
    }

    public function getBills(Request $request){
        $url = $request->fullUrl();
        $dangCho = count(Bill::where('status_id', 1)->get());
        $daXacNhan = count(Bill::where('status_id', 2)->get());
        $dangXuLy = count(Bill::where('status_id', 3)->get());
        $daGiao = count(Bill::where('status_id', 4)->get());
        $daHuy = count(Bill::where('status_id', 5)->get());
        $trangThaiDonHang = BillStatus::all();
        $dieuKienTimKiem = $this->getSearchCondition($request);
        $ngayTaoDon = DB::table('bills')->select('bills.date_order')->groupBy('date_order')->get();
        $bills = DB::table('bills')
            ->leftJoin('bill_status','bills.status_id','=','bill_status.id')
            ->leftJoin('customer','bills.customer_id','=','customer.id')
            ->select('bills.id','customer.address','bills.date_order','bills.total', 'bill_status.bill_status_name','bills.note','customer.name as customer_name','customer.phone_number')
            ->where($dieuKienTimKiem)
            ->paginate(5);
        $bills->withPath($url);
        return view('pages.adminBills',[
            'Bills'=>$bills,
            'BillStatus'=>$trangThaiDonHang,
            'DateOrders'=>$ngayTaoDon,
            'dangCho' => $dangCho,
            'daXacNhan' =>$daXacNhan,
            'dangXuLy' => $dangXuLy,
            'daGiao' => $daGiao,
            'daHuy' => $daHuy
        ]);
    }

    public function getSearchCondition($request){
        $tenKhachHang = $request->tenKhachHang;
        $idDonHang = $request->idDonHang;
        $trangThaiDonHang = $request->trangThaiDonHang;
        $ngay = $request->ngay;
        $dieuKienTimKiem = [];
        if($tenKhachHang != null){
            $dieuKienTimKiem[] = ['customer.name','like','%'.$tenKhachHang.'%'];
        }
        if($trangThaiDonHang != null && $trangThaiDonHang != 'none'){
            $dieuKienTimKiem[] = ['bills.status_id','=', (int) $trangThaiDonHang];
        }
        if($ngay != null && $ngay != 'none'){
            $dieuKienTimKiem[] = ['bills.date_order','=', $ngay];
        }
        if($idDonHang != null){
            $dieuKienTimKiem[] = ['bills.id','=',$idDonHang];
        }

        return $dieuKienTimKiem;
    }
}
