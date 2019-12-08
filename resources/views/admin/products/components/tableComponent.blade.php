   
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
             $td->quantity < $td->alert_quantity ? $alertrow = 'alert-danger' : $alertrow ="";  
            @endphp 
           <tr class="row{{$td['id']}} {{ $alertrow }}">
                @foreach($tdOnly as $only)
                @if($only == "category_id")
                <td class='text-center'> {{ $td->getCategory['name'] }} </td> 
                @elseif($only == "unit_id")
                <td class='text-center'> {{ $td->getUnit['name'] }} </td> 
                @else
                <td class='text-center'> {{ ($only == 'quantity') || ($only == 'sell_price') || ($only == 'pay_price') ? round($td->$only,3)  : $td->$only }} </td>  
                @endif           
                @endforeach

                @if(isset($Otipnsinputs) && !empty($Otipnsinputs) )
                <td class='text-center'>
                @foreach($Otipnsinputs as $inputOption)
                  @if($inputOption != "")
                    @include($inputOption)
                  @endif
                @endforeach
                </td>
                @endif  
            </tr>
          @endforeach      
        </tbody>
