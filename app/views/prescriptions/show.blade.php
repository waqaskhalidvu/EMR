@extends('prescriptions.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Prescription Details
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Prescription Details
            </div>
		</div>
		<br><br><br>
@stop

@section('content2')

	   <center>
            <div id="regForm" style="border-radius: 10px;border: 4px solid #129894; width: 800px; height: 100%; background-color: #EBEBEB">
                <table class="row_border" style="  margin: 5%;" width="621" height="720">
             
              <tr>
                <td width="272" height="55"><label>Current Visit Date:</label></td>
                <td width="333"><label>{{{ $prescription->appointment->date }}}</label></td>
                </tr>

                 <tr>
                <td width="272" height="55"><label>Doctor Name:</label> </td>
                <td width="333"><label>{{{ $prescription->appointment->employee->name }}}</label></td>
                </tr>

                <tr>
                <td width="272"><label>Prescription Code:</label></td>
                <td width="333"><label><div style="width: 333px; word-wrap: break-word">{{{ $prescription->code }}}</label></td>
                </tr>

                <tr>
                <td width="272"><label>Medicines:</label></td>
                <td width="333"><label><div style="width: 333px; word-wrap: break-word">{{{ $prescription->medicines }}}</div></label></td>
                </tr>

              
                <tr>
                <td width="272"><label>Note:</label></td>
                <td width="333"><label><div style="width: 333px; word-wrap: break-word">{{{ $prescription->note }}}</div></label></td>
                </tr>

            </table>
            <center>
                  <section style="margin-bottom: 10%">
                      <input type="submit" onclick="back()" value="Back" class="submit" />
                  </section>
             </center>
            </div>
        </center>

		<br><br>

     
@stop