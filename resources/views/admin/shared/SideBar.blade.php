<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"> Menu Management </li>
        <!-- Optionally, you can add icons to the links -->
        @if( is_permited('dashboard','view') == 1 )
        <li class="{{ is_active('dashboard') }}" ><a href="{{ route('dashboard.index') }}"><i class="fa fa-tachometer"></i> <span>Dashboard ( لوجة التحكم ) </span></a></li>
        @endif

        @if( (is_permited('groups','view') == 1) || ( is_permited('users','view') == 1 )  )
        <li class="treeview {{ is_active('groups') }} {{ is_active('users') }}">
          <a href="#"><i class="fa fa-users"></i> <span> U/M ( ادارة المستخدمين ) </span>
          </a>
          <ul class="treeview-menu">
            @if( is_permited('groups','view') == 1 )
            <li class="{{ is_active('groups') }}" ><a href="{{ route('groups.index') }}">Groups ( المجموعات ) </a></li>
            @endif

            @if( is_permited('users','view') == 1 )
            <li class="{{ is_active('users') }}" ><a href="{{ route('users.index') }}">Users ( المستخدمين ) </a></li>
            @endif
          </ul>
        </li>
        @endif

        @if( (is_permited('suppliers','view') == 1) )
        <li class="treeview {{ is_active('suppliers') }}">
          <a href="#"><i class="fa fa-handshake-o"></i> <span> S/C/M ( ادارة العملاء و الموردين ) </span>
          </a>
          <ul class="treeview-menu">
            @if( is_permited('suppliers','view') == 1 )
            <li class="{{ is_active('suppliers') }}" ><a href="{{ route('suppliers.index') }}">S/C ( العملاء والموردين )</a></li>
            @endif
          </ul>
        </li>
        @endif

        @if( (is_permited('categories','view') == 1) || (is_permited('products','view') == 1) || ( (is_permited('units','view') == 1) ) )

        <li class="treeview {{ is_active('categories') }} {{ is_active('products') }} {{ is_active('units') }} ">
          <a href="#"><i class="fa fa-hdd-o"></i> <span> Store ( المخزن ) </span>
          </a>
          <ul class="treeview-menu">
            @if( is_permited('categories','view') == 1 )
            <li class="{{ is_active('categories') }}" ><a href="{{ route('categories.index') }}"> Category ( الاقسام )</a></li>
            @endif

            @if( is_permited('units','view') == 1 )
            <li class="{{ is_active('units') }}" ><a href="{{ route('units.index') }}"> Units ( الوحدات )</a></li>
            @endif

            @if( is_permited('products','view') == 1 )
            <li class="{{ is_active('products') }}" ><a href="{{ route('products.index') }}"> Products ( الاصناف )</a></li>
            @endif
          </ul>
        </li>
       @endif

       @if( (is_permited('PurchaseInvoice','view') == 1) || (is_permited('sellInvoice','view') == 1) || ( (is_permited('totalgainindex','view') == 1) ) )
        <li class="treeview {{ is_active('PurchaseInvoice') }} {{ is_active('sellInvoice') }} {{ is_active('totalgainindex') }}">
          <a href="#"><i class="fa fa-list-alt"></i> <span> INVO/M ( ادارة الفواتير ) </span>
          </a>
          <ul class="treeview-menu">
            @if( is_permited('PurchaseInvoice','view') == 1 )
            <li class="{{ is_active('PurchaseInvoice') }}" ><a href="{{ route('purchaseInvoice.index') }}"> PUR/IN ( فواتير المشتريات ) </a></li>
            @endif

            @if( is_permited('sellInvoice','view') == 1 )
            <li class="{{ is_active('sellInvoice') }}" ><a href="{{ route('sellInvoice.index') }}"> SELL/IN ( فواتير المبيعات ) </a></li>
            @endif

            @if( is_permited('totalgainindex','view') == 1 )
            <li class="{{ is_active('totalgainindex') }}" ><a href="{{ route('totalgainindex.index') }}"> TG/IN/P ( صافي الربح لفنرة ) </a></li>
            @endif

          </ul>
        </li>

        @endif

        @if( is_permited('boxes','view') == 1 )
        <li class="{{ is_active('boxes') }}" ><a href="{{ route('boxes.index') }}"><i class="fa fa-archive"></i> <span>Box ( الصندوق ) </span></a></li>
        @endif

        @if( is_permited('otherinvoices','view') == 1 )
        <li class="{{ is_active('otherinvoices') }}" ><a href="{{ route('otherinvoices.index') }}"><i class="fa fa-money"></i> <span>Other Invoice ( المصروفات ) </span></a></li>
        @endif
        @if( is_permited('reservations','view') == 1 )
        <li class="{{ is_active('reservations') }}" ><a href="{{ route('reservations.index') }}"><i class="fa fa-calendar-check-o"></i> <span>Reservations ( الحجوزات ) </span></a></li>
        @endif
          @if( is_permited('patients','view') == 1 )
              <li class="{{ is_active('patients') }}" ><a href="{{ route('patients.index') }}"><i class="fa fa-frown-o"></i> <span>Patients ( المرضي ) </span></a></li>
          @endif
          @if( is_permited('doctors','view') == 1 )
              <li class="{{ is_active('doctors') }}" ><a href="{{ route('doctors.index') }}"><i class="fa fa-user-md"></i> <span>Doctors ( الاطباء ) </span></a></li>
          @endif
          @if( is_permited('clinics','view') == 1 )
              <li class="{{ is_active('clinics') }}" ><a href="{{ route('clinics.index') }}"><i class="fa fa-hospital-o"></i> <span>Clinics ( العيادات ) </span></a></li>
          @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
