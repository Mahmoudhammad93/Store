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

                <td class="text-center">
                    {{ $td->patient_no }}
                </td>
                <td class="text-center">
                    {{ $td->name }}
                </td>
                <td class="text-center">
                    {{ $td->gender }}
                </td>
                <td class="text-center">
                    {{ $td->phone }}
                </td>
                <td class="text-center">
                    {{ $td->date_of_birth }}
                </td>
                <td class="text-center">
                    {{ $td->created_at->format('M-d-y') }}
                </td>
                <td class="text-center">
                    {{ $td->res_expire_date }}
                </td>
                <td class="text-center">
                    {{ $td->notes }}
                </td>

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
