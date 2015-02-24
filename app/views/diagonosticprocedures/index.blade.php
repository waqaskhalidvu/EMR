@extends('diagonosticprocedures.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    Manage Diagonostic Procedure
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content2')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Manage Diagonostic Procedure
            </div>
		</div>


		<!--========================================================
                                     Data Table
            =========================================================-->
            <center style="margin-top: 7%;">
            <center>{{ link_to_route('diagonosticprocedures.create', 'Add Diagonostic Procedure', ['id' => $patient->id], ['class' => 'btn_1'])}}</center>
            		<br>
                <table id="example" style=" border: 1px solid black" class="display" cellspacing="0" width="80%">
                <thead>
                    <tr>
                        <th style="width: 20%">Diagonostic Procedure</th>


                        
                        <th style="width: 10%">Manage</th>
                    </tr>
                </thead>

                <tbody>

                @if(($patient->diagonosticprocedures) != null)
                    @foreach($patient->diagonosticprocedures as $diagonosticprocedure)
                        <tr>
                           <td> {{ substr($diagonosticprocedure->procedure_note, 0, 40) . '...' }} </td>

                            <td>
                            {{ link_to_route('diagonosticprocedures.show', 'View', [$diagonosticprocedure->id], ['class' => 'data_table_btn', 'style' => 'margin-bottom: 2px'])}}
                            {{ link_to_route('diagonosticprocedures.edit', 'Edit', [$diagonosticprocedure->id], ['class' => 'data_table_btn'])}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            </center>

     
@stop

