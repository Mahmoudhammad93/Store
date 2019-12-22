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
                <td class='text-center'>
                    @if(isset($td->getSupplier->name) && $td->getSupplier->type == 1)
                        {{ $td->getSupplier->name }}
                    @else
                        Customer is deleted
                    @endif
                </td>
                @else
                <td class='text-center'>{{ ( $only == 'total_value' ) || ( $only == 'total_gain' ) ? round($td->$only,3) : $td->$only }}</td>
                @endif
                @endforeach
                @if(isset($Otipnsinputs) && !empty($Otipnsinputs) )
                <td class='text-center'>
                @if( is_permited('sellInvoice','delete') == 1 )
                <form method="POST" action="{{route('sellInvoice.delete',$td->id)}}" style="display: inline;">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                 <button class="btn btn-sm btn-danger btn-flat center"><i class="fa fa-times"></i> Delete ( مسح ) </button>
                </form>
                @endif

               @if( is_permited('sellInvoice','edit') == 1 )
                <a href="{{ route('sellInvoice.edit',$td->id) }}" class="btn btn-sm btn-warning btn-flat center"><i class="fa fa-edit"></i> Edit ( تعديل ) </a>
               @endif
                <a href="{{ route('sellInvoice.show',$td->id) }}" class="btn btn-sm btn-info btn-flat center"><i class="fa fa-eye"></i> Show ( تفاصيل ) </a>
                @if( is_permited('sellInvoice','print') == 1 )
                <a href="{{ route('sellInvoice.printSingleInvoice',$td->id) }}" class="btn btn-sm btn-success btn-flat center"><i class="fa fa-print"></i> Print ( طباعة ) </a>
                @endif
                </td>
                @endif

            </tr>
          @endforeach
        </tbody>
