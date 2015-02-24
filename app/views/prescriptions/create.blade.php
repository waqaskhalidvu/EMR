@extends('prescriptions.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Create Prescriptions
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Create Prescriptions
            </div>
		</div>
		<br><br><br>
@stop


@section('content2')

        @foreach($errors->all("<p class='error'>:message</p>") as $message)
	    {{ $message }}
		@endforeach

		<br/>
	   <center>
            <div style="border: 4px solid #129894; width: 800px; border-radius: 10px; background-color: #EBEBEB">

            {{ Form::open(array('action' => 'PrescriptionsController@store', 'style' => 'padding: 40px', 'id' => 'regForm')) }}
                <table width="621" height="720" border="0">
              
              <tr>
                 <td width="272" height="55"><label>Current Visit Date:</label> </td>
                 <td width="333">
                    <label> {{ $appointment->date }}</label>
                 </td>
              </tr>

              <tr>
                <td width="272" height="55"><label>Doctor Name:</label> </td>
                <td width="333">
                
                	<label> {{ $appointment->employee->name }}</label>

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
                <td width="333" height="200">{{ Form::textarea('medicines', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'medicines', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}</td>
                </tr>

                <tr>
                <td width="272"><label>Note:</label></td>
                <td width="333" height="200">{{ Form::textarea('note', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'note', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}</td>
                </tr>

                <tr>
                <input name="patient_id" type="hidden" value="{{ $appointment->patient->id }}">
                <input name="appointment_id" type="hidden" value="{{ $appointment->id }}">
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
            {{ Form::close() }}
            </div>
        </center>
		
		<br><br>

      
@stop