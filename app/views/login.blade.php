@extends('public_layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Login
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_login")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content')

    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Employee Login
            </div>
		</div>

		@foreach($errors->all("<p class='error'>:message</p>") as $message)
        	    {{ $message }}
        @endforeach

		<br><br><br>
		<div class="login">
			<div class="login-card">
				<h1>Login!</h1><br>
				
				{{ Form::open(array('url' => 'validate')) }}
                    <input type="email" id = "email" name="email" placeholder="Email" required="true">
                    <input type="password" required="true" name="password" id="password" placeholder="Password">
                    <input style="width:100%" type="submit" name="login" class="login login-submit" value="login">
				{{ Form::close() }}

				{{--</form>--}}

				<div class="login-help">
				<a href="remind">Forgot Password</a>
				</div>
			</div>
		</div>
		
		<br><br><br>
		<br><br><br><br><br><br><br>
        <center>
            {{--<style>--}}
                {{--#user_pass table, tr, td, th {--}}
                    {{--border: 2px solid black;--}}
                    {{--color: black;--}}
                    {{--font-weight:500;--}}
                {{--}--}}
                {{--#user_pass th{--}}
                    {{--background: #129894;--}}
                    {{--color: white;--}}
                {{--}--}}
            {{--</style>--}}
            {{--<div id="user_pass">--}}
                {{--<table style="margin-top: 100px;text-align:center;" width="393">--}}
                {{--<tr>--}}
                {{--<th width="207" style="text-align: center"><strong>User Name</strong></th>--}}
                {{--<th width="183" style="text-align: center"><strong>Password</strong></th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>doctor</td>--}}
                {{--<td>doctor</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>receptionist</td>--}}
                {{--<td>receptionist</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>admin</td>--}}
                {{--<td>admin</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>lab_manager</td>--}}
                {{--<td>lab_manager</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td>accountant</td>--}}
                {{--<td>accountant</td>--}}
                {{--</tr>--}}
                {{--</table>--}}
            {{--</div>--}}
 </center>
      
@stop