<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Bill;

class InvoiceController extends Controller
{  
    public function view(){
        $latestOrder = Customers::orderBy('created_at','DESC')->first();
        if($latestOrder){
            $id = $latestOrder->id;
        }else{
            $id = 0;
        }      
        $billno = '#'.str_pad($id + 1, 8, "0", STR_PAD_LEFT);
        return view('invoice-form', compact('billno'));

    }

    public function generate(Request $request){
        $data=$request->all();

        $customer = new Customers;
        $data['customer_name']= $request->customer_name;
        $data['customer_name']= $request->customer_name;
        $data['bill_no']= $request->bill_no;
        $data['customer_address']= $request->customer_address;
        $data['total_with_tax']=  $request->total_with_tax;
        $data['total_without_tax']= $request->total_without_tax;
        $data['discount']= $request->discount;
        $data['grand_total']= $request->grand_total;
        $data['invoice_date']= $request->invoice_date;

        $customer->fill($data);
        $save=$customer->save();
        $customer_id = $customer->id;

            $product=$request->product;
            $price=$request->price;
            $tax=$request->tax;
            $qty=$request->qty;
            $tax_amount=$request->tax_amount;
            $total=$request->total;


              for($i=0;$i<count($product);$i++) {
                if($product[$i]!=''){
                 $bill= new Bill;   
                  $data['customer_id'] = $customer_id;
                  $data['product']= $product[$i];
                  $data['price']= $price[$i];
                  $data['tax']= $tax[$i];
                  $data['qty']= $qty[$i];
                  $data['tax_amount']= $tax_amount[$i];
                  $data['total']= $total[$i];

                  $bill->fill($data);
                  $save=$bill->save();
                   }
                }
       
       $user =  Customers::where('id', $customer_id)->first();             
       $datas = Bill::where('customer_id', $customer_id)->get();         
       return view('invoice', compact('datas','user'));

    }
}
