@if( is_permited('sellInvoice','print') == 1 )
@extends('admin.shared.master')
@section('content')

<section class="invoice">
    <div class="row">
        <div class="col-md-12 text-right">
            @if( is_permited('sellInvoice','print') == 1 )
                <a href="{{ route('sellInvoice.printSingleInvoice',$row->id) }}" class="btn btn-sm btn-success btn-flat center"><i class="fa fa-print"></i> Print ( طباعة ) </a>
            @endif
        </div>
    </div>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Store , Sys.
            <small class="pull-right">Date: {{ date('y-m-d') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          To ( الي ) : <strong> {{ $row->getSupplier->name }} </strong>
          <address>
            <br> Address ( العنوان )  : {{ $row->getSupplier->address }}
            <br> Phone ( رقم الهاتف ) : {{ $row->getSupplier->phone }}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>  Code ( الكود ) : # {{ $row->code }}</b><br>
          <br>
          <b> Date ( التاريخ ):</b> {{ $row->date }}<br>
          <b>Total Value ( الاجمالي ):</b> {{ round($row->total_value,5)  }} LE <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Category ( القسم ) </th>
              <th>Product ( الصنف ) </th>
              <th>Product Code ( كود الصنف ) #</th>
              <th>َQuantity ( الكمية )</th>
              <th>Sell Price ( سعر البيع )</th>
              <th>Total Price ( الاجمالي )</th>
            </tr>
            </thead>

            <tbody>
            @php
             $i = 1;
            @endphp
            @foreach($row->getInvoiceProducts as $inPro)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $inPro->getProduct->getCategory->name }}</td>
              <td>{{ $inPro->getProduct->name }}</td>
              <td>{{ $inPro->getProduct->code }}</td>
              <td>{{ round($inPro->quantity,3) }}</td>
              <td>{{ round($inPro->sell_price,3) }}</td>
              <td>{{ round($inPro->total_price,3) }}</td>
            </tr>
            @php
             $i = $i + 1;
            @endphp
            @endforeach
            <tr>
              <td colspan='6' class="text-center" > Total Value ( الاجمالي ) : <span style="color: red; font-size: 20px;"> {{ round($row->total_value,5) }} LE </span> </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    </section>
@endsection
@else
{{ dd('not Permitied ( ليس لديك الصلاحيات لرؤية هذا المحتوي )') }}
@endif
