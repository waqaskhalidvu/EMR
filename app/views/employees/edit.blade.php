@extends('employees.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Edit Employee
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Edit Employee
            </div>
		</div>
		<br><br><br>
@stop

@section('content2')

    <!-------------------------- Error Messages ----------------------->

        @foreach($errors->all("<p class='error'>:message</p>") as $message)
	    {{ $message }}
		@endforeach

		<br/>
	   <center>
            <div style="border: 4px solid #129894; width: 800px; border-radius: 10px; background-color: #EBEBEB">

            {{ Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'put' ,'style' => 'padding: 40px', 'id' => 'regForm'])}}

                <table width="621" height="720" border="0">
              <tr>
                <td width="272" height="55"><label>Employee Name*</label> </td>
                <td width="333"><input type="text" id="name" required="true" value="{{{ Form::getValueAttribute('name', null) }}}" name="name"></td>
                </tr>
              <tr>
                <td width="272" height="55"><label>     Email*</label></td>
                <td width="333"><input type="email" required="true" value="{{{ Form::getValueAttribute('email', null) }}}" id="email" name="email" ></td>
                </tr>
              <tr>
                <td width="272" height="55"><label>      Gender*</label></td>
                <td width="333"><span>
                  <label class="radio">
                    <input style="width: 30px" type="radio" required="true" name="gender" @if($employee->gender == 'Male') checked="true" @endif value="Male" id="gender_0">
                    Male</label>
                 &nbsp;     &nbsp;     &nbsp;
                  <label class="radio">
                    <input style="width: 30px" type="radio" required="true" name="gender" @if($employee->gender == 'Female') checked="true" @endif value="Female" id="gender_1">
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
                <td width="272" height="55"><label> Role*</label></td>
                <td width="333"><select required name="role">
                  <option selected value="" disabled>Select Role</option>
                  <option @if($employee->role == "Administrator") selected="true" @endif value="Administrator">Administrator</option>
                  <option @if($employee->role == "Doctor") selected="true" @endif value="Doctor">Doctor</option>
                  <option @if($employee->role == "Accountant") selected="true" @endif value="Accountant">Accountant</option>
                  <option @if($employee->role == "Receptionist") selected="true" @endif value="Receptionist">Receptionist</option>
                  <option @if($employee->role == "Lab Manager") selected="true" @endif value="Lab Manager">Lab Manager</option>
                </select></td>
                </tr>
                <tr>
                <td width="272" height="55"><label> Branch Name:</label></td>
                <td width="333"><select name="branch" style="width: 70%">
                  <option selected disabled>Select Branch</option>
                  <option @if($employee->branch == "DHA") selected="true" @endif value="DHA">DHA</option>
                  <option @if($employee->branch == "Gulberg") selected="true" @endif value="Gulberg">Gulberg</option>
                  <option @if($employee->branch == "Canal View") selected="true" @endif value="Canal View">Canal View</option>
                  <option @if($employee->branch == "Garden Town") selected="true" @endif value="Garden Town">Garden Town</option>
                  <option @if($employee->branch == "Johar Town") selected="true" @endif value='Johar Town'>Johar Town</option>
                </select></td>
                </tr>
                <tr>
                  <td width="272" height="55"><label> Status*</label></td>
                  <td width="333"><select required="true" name="status" style="width: 70%">
                     <option selected value="" disabled>Select Status</option>
                     <option @if($employee->status == "Active") selected="true" @endif value="Active">Active</option>
                     <option @if($employee->status == "Inactive") selected="true" @endif value="Inactive">Inactive</option>
                   </select></td>
                </tr>
                <tr>
                <td width="272"><label>Additional Info:</label></td>
                <td width="333" height="200">
                {{ Form::textarea('note', null, array('rows' => '7', 'cols' => '20', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}
                </td>
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