@extends('layouts.invoice_form')
@section('content')

<div class="container">
 <form method="POST" action="{{ route('invoice.create') }}">   
 @csrf
  <div class="row clearfix">
    <div class="col-md-12">
    <p class="text-muted">Bill To</p>
              
              <div class="col-md-6 col-sm-12 text-md-left">
                <ul class="px-0 list-unstyled">
                 <li>{{$billno}} </li> 
                 <input type="hidden" name="bill_no" value="{{$billno}}">  
                  <li>Customer Name: <input type="text" name="customer_name" value="" required></li>
                  <li>Customer Address: <input type="text" name="customer_address" value="" required></li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p>
                  <span class="text-muted">Invoice Date :</span> {{ date('d-m-Y') }}</p>
                  <input type="hidden" name="invoice_date" value="{{ date('d-m-Y') }}">
               
              </div>
            
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Tax</th>
            <th class="text-center"> Tax Amount </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td><input type="text" name='product[]'  placeholder='Enter Product Name' class="form-control"/></td>
            <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td><select name='tax[]'  class="form-control tax">
                <option value="0">0%</option>
                <option value="1">1%</option>
                <option value="5">5%</option>
                <option value="10">10%</option>
            </select></td>
            <td><input type="number" name='tax_amount[]' placeholder='Tax Amount' class="form-control tax_amount" readonly/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <button id="add_row" class="btn btn-default pull-left">Add Row</button>
      <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total (with tax)</th>
            <td class="text-center"><input type="number" name='total_with_tax' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Sub Total (without tax)</th>
            <td class="text-center"><input type="number" name='total_without_tax' placeholder='0.00' class="form-control" id="total_without_tax" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Discount</th>
            <td class="text-center"><input type="number" name='discount' id="discount"  class="form-control"/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='grand_total' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>


    </div>
  </div>
  <div class="text-center">
      <button type="submit" class="btn btn-primary">Genereate Invoice</button>
    </div>
</form>
</div>
@endsection