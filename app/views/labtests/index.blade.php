@extends('labtests.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    Manage Lab Test
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content2')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Manage Lab Test
            </div>
		</div>


		<!--========================================================
                                     Data Table
            =========================================================-->
            <center style="margin-top: 7%;">

        @if(Auth::user()->role != 'Doctor') 
        @if(!isset($flag))
            <center>{{ link_to_route('labtests.create', 'Create Lab Test', ['id' => $appointment->id], ['class' => 'btn_1'])}}</center>
            		<br>
        @endif
        @endif
                <table id="example" style=" border: 1px solid black" class="display" cellspacing="0" width="80%">
                <thead>
                    <tr>
                        
                        <th>Test Name</th>
                        <th>Test Fee</th>
                        <th style="width: 25%">Manage</th>
                    </tr>
                </thead>

                <tbody>
                @if(($appointment->labtests) != null)
                    @foreach($appointment->labtests as $labtest)
                        <tr>
                            <td>{{{ $labtest->test_name }}}</td>                                                      
                            <td>{{{ ($labtest->total_fee != 0)? $labtest->total_fee : 'Unpaid' }}}</td>
                            <td>
                            
                        
                        @if(isset($flag))
                        {{ link_to_route('labtests.show', 'View', [$labtest->id, 'flag' => 'test_fee'], ['class' => 'data_table_btn', 'style' => 'margin-bottom: 2px'])}}
                        {{ link_to_route('labtests.edit', 'Edit', [$labtest->id, 'flag' => 'test_fee'], ['class' => 'data_table_btn'])}}
                        @else
                        {{ link_to_route('labtests.show', 'View', [$labtest->id], ['class' => 'data_table_btn', 'style' => 'margin-bottom: 2px'])}}
                        @endif

                        @if(Auth::user()->role != 'Doctor' || !isset($flag)) 
                            {{ link_to_route('labtests.edit', 'Edit', [$labtest->id], ['class' => 'data_table_btn'])}}
                        @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            </center>

     
@stop

