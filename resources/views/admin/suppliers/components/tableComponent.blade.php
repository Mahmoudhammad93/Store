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
            <tr class="row{{$td['id']}}">
                @foreach($tdOnly as $only)
                <td class='text-center'>
                @if( $only == "functionGetType" )
                  {{ $td->getType->name }}
                @else
                {{ $td->$only }}
                @endif
                </td>             
                @endforeach 

                @if(isset($Otipnsinputs) && !empty($Otipnsinputs) )
                <td class='text-center'>
                @foreach($Otipnsinputs as $inputOption)
                  @if($inputOption != "")
                    @include($inputOption)
                  @endif
                @endforeach

                <a href="{{ route($buttonsRoutsname.'.profile',$td->id) }}" class="btn btn-sm btn-info btn-flat center"><i class="fa fa-user"></i> Profile ( الحساب ) </a>

                </td>
                @endif  
            </tr>
          @endforeach      
        </tbody>
