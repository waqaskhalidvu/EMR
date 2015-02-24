@extends('patients.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Edit Patient
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Edit Patient
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

            {{ Form::model($patient, ['route' => ['patients.update', $patient->id], 'method' => 'put' ,'style' => 'padding: 40px', 'id' => 'regForm'])}}

                <table width="621" height="720" border="0">
              <tr>
                <td width="272" height="55"><label>Patient Name*</label> </td>
                <td width="333">
                    {{ Form::input('text', 'name', null, array('required' => 'true')) }}
                </td>
                </tr>
              <tr>
                 <td width="272" height="55"><label>Date of Birth:</label> </td>
                 <td width="333">
                    {{ Form::input('date', 'dob', Form::getValueAttribute('dob', null), array('placeholder' => 'mm/dd/yyyy')) }}
                 </td>
              </tr>
              <tr>
                <td width="272" height="55"><label>     Email:</label></td>
                <td width="333">
                    {{ Form::input('email', 'email', null) }}
               </td>
                </tr>
              <tr>
                <td width="272" height="55"><label>      Gender:</label></td>
                <td width="333"><span>
                  <label class="radio">
                    <input style="width: 30px" type="radio" required="true" name="gender" @if($patient->gender == 'Male') checked="true" @endif value="Male" id="gender_0">
                    Male</label>
                 &nbsp;     &nbsp;     &nbsp;
                  <label class="radio">
                    <input style="width: 30px" type="radio" required="true" name="gender" @if($patient->gender == 'Female') checked="true" @endif value="Female" id="gender_1">
                    Female</label>

                </span>
                </td>
                </tr>
                <tr>
                <td width="272" height="55"><label>      Age*</label></td>
                <td width="333"><input type="number" id="age" required="true" value="{{{ Form::getValueAttribute('age', null) }}}" name="age"></td>
                </tr><tr>
                <td width="272" height="55"><label>      City*</label></td>
                <td width="333"><input type="text" id="city" required="true" value="{{{ Form::getValueAttribute('city', null) }}}" name="city"></td>
                </tr>
                <tr>
                     <td width="272" height="55"><label>      Country*</label></td>
                     <td width="333"><input type="text" id="country" required="true" name="country" value="{{{ Form::getValueAttribute('country', null) }}}"></td>
                 </tr>
                <tr>
                <td width="272" height="55"><label>      Address*</label></td>
                <td width="333"><input type="text" id="address" required="true" name="address" value="{{{ Form::getValueAttribute('address', null) }}}"></td>
                </tr>
                <tr>
                <td width="272" height="55"><label>      Phone:</label></td>
                <td width="333"><input type="tel" id="phone" name="phone" value="{{{ Form::getValueAttribute('phone', null) }}}"></td>
                </tr>
                <tr>
                    <td width="272" height="55"><label>      CNIC:</label></td>
                    <td width="333"><input type="number" id="cnic" name="cnic" value="{{{ Form::getValueAttribute('cnic', null) }}}"></td>
                 </tr>
                <tr>
                <td width="272"><label>Additional Info:</label></td>
                <td width="333" height="200">{{ Form::textarea('note', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'note', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}</td>
                </tr>
                <tr>
                <td colspan="2">
                    <center>
                    <div class="btn-wrap">
                       <a class="btn_3" href="../" >Back</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" value="Update" class="submit" />
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