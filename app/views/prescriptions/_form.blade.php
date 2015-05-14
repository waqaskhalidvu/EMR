<table width="621" height="820" border="0">

              <tr>
                 <td width="272" height="55"><label>Current Visit Date*</label> </td>
                 <td width="333">
                    <label> {{ (isset($appointment))?  date('j F, Y', strtotime($appointment->date)) :  date('j F, Y', strtotime($prescription->appointment->date)) }}</label>
                 </td>
              </tr>

              <tr>
                <td width="272" height="55"><label>Doctor Name*</label> </td>
                <td width="333">

                	<label> {{ (isset($appointment))? $appointment->employee->name : $prescription->appointment->employee->name}}</label>

                </td>
                </tr>

                <tr>
                <td width="272" height="55"><label>Prescription Code:</label> </td>
                <td width="333">
                    {{ Form::input('text', 'code', null, array('required' => 'true')) }}
                </td>
                </tr>

                <tr>
                    <td width="272"><label>Medicines:</label></td>
                    <td width="333" height="60">
                    {{--{{ Form::textarea('medicines', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'medicines', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}--}}
                    {{ Form::select('medicines[]', $medicines, (isset($prescription))? $old_medicines : null, ['required' => 'true', 'id' => 'medicines', 'style' => 'width: 97%', 'multiple' => 'multiple'] ); }}
                    </td>
                </tr>

                <tr>
                    <td width="272"><label>Note:</label></td>
                    <td width="333" >{{ Form::textarea('note', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'note', "style" => "font-size: 1.2em; resize: none; margin-top: 10px") ) }}</td>
                </tr>

                <tr>
                <td width="272"><label>Procedure</label></td>
                <td width="333">{{ Form::textarea('procedure', null, array('rows' => '7', 'cols' => '20', 'required' => 'true', 'placeholder' => 'procedure', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}</td>
                </tr>

                <tr>
                @if(isset($appointment))
                    <input name="patient_id" type="hidden" value="{{ $appointment->patient->id }}">
                    <input name="appointment_id" type="hidden" value="{{ $appointment->id }}">
                @endif
                <td colspan="2">
                    <center>
                    <div class="btn-wrap">
                        <a class="btn_3" href="javascript:document.getElementById('regForm').reset();" data-type="reset">Reset</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="Save" class="submit" />
                    </div>
                </center>
                </td>
                </tr>
            </table>