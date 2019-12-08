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
                <td class='text-center'>{{ $td->$only }}</td>             
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
