    <!-- // build table data -->
        <thead>
            <tr>
            @foreach ($ths as $th) 
                <th class='text-center'> {{ $th }}</th>
            @endforeach    
            </tr>
        </thead>
        <tbody>
          @foreach($tds as $td )
            @php 
            $alertrow ="";
             $td->due == 1 ? $alertrow = 'alert-danger' : $alertrow ="";  
            @endphp 
            <tr class="row{{$td['id']}} {{ $alertrow }}">
                @foreach($tdOnly as $only)
                @if($only == 'supplier_id')
                <td class='text-center'>{{ $td->getSupplier->name }}</td>  
                @else
                <td class='text-center'>{{ $only == "total_value" ? round($td->$only,3) : $td->$only }}</td>  
                @endif           
                @endforeach 
                @if(isset($Otipnsinputs) && !empty($Otipnsinputs) )
                <td class='text-center'>
                @if( is_permited('PurchaseInvoice','edit') == 1 ) 
                <form method="POST" action="{{route('purchaseInvoice.delete',$td->id)}}" style="display: inline;">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                 <button class="btn btn-sm btn-danger btn-flat center"><i class="fa fa-times"></i> Delete ( مسح ) </button>
                </form>
                @endif
                @if( is_permited('PurchaseInvoice','edit') == 1 ) 
                <a href="{{ route('purchaseInvoice.edit',$td->id) }}" class="btn btn-sm btn-warning btn-flat center"><i class="fa fa-edit"></i> Edit ( تعديل ) </a>
                @endif
                <a href="{{ route('purchaseInvoice.show',$td->id) }}" class="btn btn-sm btn-info btn-flat center"><i class="fa fa-eye"></i> Show ( تفاصيل ) </a>
                @if( is_permited('PurchaseInvoice','print') == 1 )                 
                <a href="{{ route('purchaseInvoice.printSingleInvoice',$td->id) }}" class="btn btn-sm btn-success btn-flat center"><i class="fa fa-print"></i> Print ( طباعة ) </a>
                @endif
                </td>
                @endif
               
            </tr>
          @endforeach      
        </tbody>
