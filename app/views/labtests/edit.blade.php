@extends('labtests.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Edit Lab Test
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Edit Lab Test
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

            {{ Form::model($labtest, ['route' => ['labtests.update', $labtest->id], 'method' => 'put' ,'style' => 'padding: 40px', 'id' => 'regForm'])}}

                <table width="621" height="720" border="0">
              <tr>
                <td width="272" height="55"><label>Patient Name:</label> </td>
                <td width="333">
                    <label>{{ $labtest->patient->name }}</label>
                </td>
                </tr>

                <tr>
                <td width="272" height="55"><label>Test Name:</label> </td>
                <td width="333">
                    {{ Form::input('text', 'test_name', null, array('required' => 'true')) }}
                </td>
                </tr>

                <tr>
                <td width="272" height="55"><label>Test Fee:</label> </td>
                <td width="333">
                    {{ Form::input('number', 'total_fee', null, array('required' => 'true')) }}
                </td>
                </tr>

                 <tr>
                <td width="272"><label>Test Results:</label></td>
                <td width="333" height="200">{{ Form::textarea('test_results', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'note', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}</td>
                </tr>
             

                <tr>
                <td width="272"><label>Description:</label></td>
                <td width="333" height="200">{{ Form::textarea('test_description', null, array('rows' => '7', 'cols' => '20', 'placeholder' => 'note', "style" => "font-size: 1.2em; margin-top: 2px; resize: none;") ) }}</td>
                </tr>
                <tr>
                    <input name="appointment_id" type="hidden" value="{{ $labtest->appointment->id }}">
                <td colspan="2">
                    <center>
                    <div class="btn-wrap">
                      <input type="submit" onclick="back()" value="Back" class="submit" />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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