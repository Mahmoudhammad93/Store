
<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
@php

$input = "name";
inputForm('Name ( اسم الجموعة )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter Name ( اسم المجموعة )','value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "desc";
inputForm('Description ( تفاصيل )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter Description ( التفاصيل ) ','value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp
<br><hr>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Page (الصفحة)</th>
        <th scope="col">Previliges ( الصلحيات )</th>
        <th scope="col">All ( اختار كل الصلحيات ) <input type="checkbox" onClick="setAllCheckboxes('actors', this);"> </th>
    </tr>
   </thead>
    <tbody id="actors">
        <?php
          $itrator = 0 ;
          $allmenus = [
              [
                  'name' => 'Dashboard ( لوحة التحكم )',
                  'menu' => 'dashboard'
              ],
              [
                'name' => 'Groups ( المجموعات )',
                'menu' => 'groups'
             ],
             [
                'name' => 'Users ( المستخدمين )',
                'menu' => 'users'
             ],
             [
                'name' => 'S/C ( الزباين و الموردين )',
                'menu' => 'suppliers'
             ],
             [
                'name' => 'Categories ( الاقسام )',
                'menu' => 'categories'
             ],
             [
                'name' => 'Units ( الوحدات )',
                'menu' => 'units'
             ],
             [
                'name' => 'Products ( الاصناف )',
                'menu' => 'products'
             ],
             [
                'name' => 'PUR/IN ( فواتير المشتريات )',
                'menu' => 'PurchaseInvoice'
             ],
             [
                'name' => 'SELL/IN ( فواتير المبيعات )',
                'menu' => 'sellInvoice'
             ],
             [
                'name' => 'TG/IN/P ( صافي الربح لفنرة )',
                'menu' => 'totalgainindex'
             ],
             [
                'name' => 'Box ( الخازنة )',
                'menu' => 'boxes'
             ],
             [
                'name' => 'Other Invoice ( المصروفات ) ',
                'menu' => 'otherinvoices'
             ],
             [
                'name' => 'Reservations ( الحجوزات ) ',
                'menu' => 'reservations'
             ],
              [
                  'name' => 'Patients ( المرضي ) ',
                  'menu' => 'patient'
              ],
              [
                  'name' => 'Doctors ( الاطباء ) ',
                  'menu' => 'doctor'
              ],
              [
                  'name' => 'Clinics ( العيادات ) ',
                  'menu' => 'clinic'
              ],
              [
                  'name' => 'Tasks ( المهمات ) ',
                  'menu' => 'tasks'
              ],
              [
                  'name' => 'Services ( الخدمات ) ',
                  'menu' => 'services'
              ],
          ];
        ?>
        @foreach($allmenus as $men)
        <?php
            $addcheck     = "";
            $editcheck  = "";
            $deletecheck  = "";
            $viewcheck    = "";
            $searchcheck    = "";
            $printcheck    = "";
        ?>
       @if(isset($row))
        @foreach($row->permissions as $permiss)
            @if($permiss['menu'] == $men['menu'])
                <!-- add -->
                @if($permiss['add'] == 1)
                    <?php $addcheck = "checked";?>
                @elseif($permiss['add'] == 0)
                <?php $addcheck = "";?>
                @endif
                <!-- end of add  -->

                <!-- view -->
                @if($permiss['view'] == 1)
                    <?php $viewcheck = "checked";?>
                @elseif($permiss['view'] == 0)
                <?php $viewcheck = "";?>
                @endif
                <!-- end of view  -->

                <!-- update -->
                @if($permiss['edit'] == 1)
                    <?php $editcheck = "checked";?>
                @elseif($permiss['edit'] == 0)
                <?php $editcheck = "";?>
                @endif
                <!-- end of update  -->

                <!-- delete -->
                @if($permiss['delete'] == 1)
                    <?php $deletecheck = "checked";?>
                @elseif($permiss['delete'] == 0)
                <?php $deletecheck = "";?>
                @endif
                <!-- end of delete  -->

                 <!-- delete -->
                 @if($permiss['search'] == 1)
                    <?php $searchcheck = "checked";?>
                @elseif($permiss['search'] == 0)
                <?php $searchcheck = "";?>
                @endif
                <!-- end of delete  -->

                 <!-- delete -->
                 @if($permiss['print'] == 1)
                    <?php $printcheck = "checked";?>
                @elseif($permiss['print'] == 0)
                <?php $printcheck = "";?>
                @endif
                <!-- end of print  -->
            @endif
        @endforeach
      @endif

        <tr>
            <?php $itrator = $itrator + 1 ;?>
            <th scope="row">{{ $itrator }}</th>
            <td>{{ $men['name'] }}</td>
            <input type="hidden" name="menu{{ $itrator }}" value="{{ $men['menu'] }}">
            <td>
            <div class="form-check" style="display: inline;">
                <input {{ $addcheck }} class="checkfromall form-check-input" type="checkbox" name="add{{ $itrator }}" value="1">
                <label class="form-check-label">Add ( اضافة ) </label>
            </div> |

            <div class="form-check" style="display: inline;">
                <input {{ $editcheck }} class="checkfromall form-check-input" type="checkbox" name="edit{{ $itrator }}" value="1">
            <label class="form-check-label">Update ( تعديل )</label>
            </div>|

            <div class="form-check" style="display: inline;">

                <input {{ $deletecheck }} class="checkfromall form-check-input" type="checkbox" name="delete{{ $itrator }}" value="1">
            <label class="form-check-label">Delete ( حذف )</label>
            </div>

            |

            <div class="form-check" style="display: inline;">

                <input {{ $viewcheck }} class="checkfromall form-check-input" type="checkbox" name="view{{ $itrator }}" value="1">
            <label class="form-check-label">View ( مشاهدة )</label>
            </div>

            |

            <div class="form-check" style="display: inline;">

            <input {{ $searchcheck }} class="checkfromall form-check-input" type="checkbox" name="search{{ $itrator }}" value="1">
        <label class="form-check-label">Search ( بحث )</label>
        </div>

        |

        <div class="form-check" style="display: inline;">

            <input {{ $printcheck }} class="checkfromall form-check-input" type="checkbox" name="print{{ $itrator }}" value="1">
        <label class="form-check-label">Print ( طباعة )</label>
        </div>

            </td>
        </tr>

        <?php
            $addcheck     = "";
            $editcheck  = "";
            $deletecheck  = "";
            $viewcheck    = "";
            $searchcheck    = "";
            $printcheck    = "";
        ?>

        @endforeach
     <input type="hidden" name="itrator" value="{{ $itrator }}" />
    </tbody>
 </table>

</div>
<!-- /.box-body -->
<div class="box-footer">
<input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
</div>

<script type="text/javascript">
   function setAllCheckboxes(divId, sourceCheckbox) {
    divElement = document.getElementById(divId);
    inputElements = divElement.getElementsByTagName('input');
    for (i = 0; i < inputElements.length; i++) {
        if (inputElements[i].type != 'checkbox')
            continue;
        inputElements[i].checked = sourceCheckbox.checked;
    }
}
 </script>
