@extends('admin.shared.master')
@section('content')
@if( is_permited('dashboard','view') == 1 )
<div class="row">

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="overlay dark"></div>
    <div class="inner text-center">
        <h3>{{ $users->count() }}</h3>

        <p>Users ( المستخدمين )</p>

    </div>
    <div class="icon">
        <i class="fa fa-users"></i>
    </div>
    <a href="{{ route('users.index') }}" class="small-box-footer">More info </a>
    </div>
</div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-navy">
            <div class="inner text-center">
                <h3>{{ $patients->count() }}</h3>

                <p>Patients ( المرضي )</p>

            </div>
            <div class="icon">
                <i class="fa fa-frown-o"></i>
            </div>
            <a href="{{ route('patients.index') }}" class="small-box-footer">More info </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="overlay dark"></div>
            <div class="inner text-center">
                <h3>{{ $reservations->count() }}</h3>

                <p>Reservations ( الحجوزات )</p>

            </div>
            <div class="icon">
                <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="{{ route('reservations.index') }}" class="small-box-footer">More info </a>
        </div>
    </div>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <span class="badge badge-danger">{{ $requests->count() }} Request</span>
    <div class="inner text-center">
        <h3>{{ $suppliers->count() }}</h3>

        <p>Suppliers/Clients ( الزباين/الموردين )</p>

    </div>
    <div class="icon">
        <i class="fa fa-handshake-o"></i>
    </div>
    <a href="{{ route('suppliers.index') }}" class="small-box-footer">More info </a>
    </div>
</div>

<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
    <div class="inner text-center">
        <h3>{{ $products->count() }}</h3>

        <p>Products ( الاصناف )</p>

    </div>
    <div class="icon">
        <i class="fa fa-product-hunt"></i>
    </div>
    <a href="{{ route('products.index') }}" class="small-box-footer">More info </a>
    </div>
</div>

<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-primary">
    <div class="inner text-center">
        <h3>{{ $purchaseInvoice->count() }}</h3>

        <p>Purchase Invoices ( فواتير المشتريات )</p>

    </div>
    <div class="icon">
        <i class="fa fa-list-alt"></i>
    </div>
    <a href="{{ route('purchaseInvoice.index') }}" class="small-box-footer">More info </a>
    </div>
</div>

<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-black">
    <div class="inner text-center">
        <h3>{{ $sellInvoice->count() }}</h3>

        <p> Sell Invoices ( فواتير المبيعات )</p>

    </div>
    <div class="icon">
        <i class="fa fa-list-alt"></i>
    </div>
    <a href="{{ route('sellInvoice.index') }}" class="small-box-footer">More info </a>
    </div>
</div>

<div class="col-lg-6 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-red">
    <div class="inner text-center">
        <h3>{{ $totalAlert }}</h3>

        <p> Alert ( النواقص بالمخزن  )</p>

    </div>
    <div class="icon">
        <i class="fa fa-minus-circle"></i>
    </div>
    <a href="{{ route('products.index') }}" class="small-box-footer">More info </a>
    </div>
</div>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
    <div class="inner text-center">
        <h3>{{ round($box->totl_value,5) }} LE</h3>

        <p> Box ( اجمالي المبلغ بالصندوق  )</p>

    </div>
    <div class="icon">
        <i class="fa fa-area-chart"></i>
    </div>
    <a href="{{ route('boxes.index') }}" class="small-box-footer">More info </a>
    </div>
</div>

    <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner text-center">
                <h3>{{ round($tasks->count()) }}</h3>

                <p> Tasks ( المهمات )</p>

            </div>
            <div class="icon">
                <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ route('tasks.index') }}" class="small-box-footer">More info </a>
        </div>
    </div>

<div class="col-lg-6 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-green">
    <div class="inner text-center">
        <h3>{{ round($totalGard,5) }} LE</h3>

        <p> Total ( اجمالي  جرد المخزن بالسعر التجاري  ) </p>

    </div>
    <div class="icon">
        <i class="fa fa-line-chart"></i>
    </div>
    <a href="#" class="small-box-footer">No More info </a>
    </div>
</div>

<div class="col-lg-6 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-lime">
    <div class="inner text-center">
        <h3>{{ round($todayTotalGain,5) }} LE</h3>

        <p> Total Gain Today ( اجمالي الربح اليوم  ) </p>

    </div>
    <div class="icon">
        <i class="fa fa-bar-chart"></i>
    </div>
    <a href="#" class="small-box-footer">No More info </a>
    </div>
</div>

    <div class="col-md-6 col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">Services Info <span>Last 5 Services<i class="fa fa-plus" style="margin-left: 20px"></i></span></div>
            <div class="panel-body">
                <div class="serv-info" style="font-weight: bold;border: 1px solid #ddd;">
                    <p>
                        Service Name
                    </p>
                    <span>
                        Service Price
                    </span>
                </div>
                @foreach($services as $service)
                    <div class="serv-info" style="border-right: 1px solid #ddd;border-left: 1px solid #ddd;">
                        <p>
                            {{ $service->c_name }}
                        </p>
                        <span>
                            {{ $service->c_price }} LE
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">Doctors Info <span><i class="fa fa-plus" style="margin-left: 20px"></i></span></div>
            <div class="panel-body">
                <div class="serv-info" style="font-weight: bold;border: 1px solid #ddd;">
                    <p>
                        Doctor Name
                    </p>
                    <span>
                        Doctor Specialty
                    </span>
                </div>
                @foreach($doctors as $doctor)
                    <div class="serv-info" style="border-right: 1px solid #ddd;border-left: 1px solid #ddd;">
                        <p>
                            {{ $doctor->name }}
                        </p>
                        <span>
                            {{ $doctor->specialty }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@else
 <h1> Not Permitied ( ليس لديك الصلاحيات لرؤية هذا المحتوي ) </h1>
@endif
@endsection
