<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillsController extends Controller
{
    public function editBillsStatus(Request $request){
        $ids = collect($request->id);
        $status = $request->capNhatTrangThai;
        foreach ($ids as $id){
            $bill = Bill::find((int)$id);
            $bill->status_id = (int) $status;
            $bill->save();
        }

        return redirect()->route('bills');
    }
}
