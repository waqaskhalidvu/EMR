@extends('admin.layouts.main')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
User Registration
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_user_reg")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        User Registration
            </div>
		</div>
@stop


<!---------------- Breadcrumbs ------------------>
@section('breadcrumbs')
    
    <div class="breadcrumb flat">
      <a href="admin_home" class="">Home</a>
      <a href="register_user" class="active">Register User</a>
      <!-- <a href="#">Unused</a>
      <a href="#">Unused</a> -->
    </div>
    
@stop
<!---------------End of Breadcrumbs -------------->


@section('content2')
		
	   <center>
            <div style="border: 4px solid #129894; width: 800px; border-radius: 10px; background-color: #EBEBEB">
            <form style="padding: 40px" id="regForm"> 
                <table width="621" height="720" border="0">
              <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      Name:</strong> </span></td>
                <td width="333"><input type="text" id="name"  required></td>
                </tr>
              <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      User ID:</strong> </span></td>
                <td width="333"><input type="text" id="user_id"  required></td>
                </tr>
              <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      Password:</strong> </span></td>
                <td width="333"><input type="password" class="pass"  required ></td>
                </tr>
              <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      Re-type Password:</strong> </span></td>
                <td width="333"><input type="password" class="pass"  required></td>
                </tr>
              <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      User Email:</strong> </span></td>
                <td width="333"><input type="email" id="email"  ></td>
                </tr>
              <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      Gender:</strong> </span></td>
                <td width="333"><span>
                  <label>
                    <input style="width: 30px" type="radio" name="gender" value="male" id="gender_0">
                    Male</label>
                 &nbsp;     &nbsp;     &nbsp;
                  <label>
                    <input style="width: 30px" type="radio" name="gender" value="female" id="gender_1">
                    Female</label>
                 
                </span></td>
                </tr>
                <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      Age:</strong> </span></td>
                <td width="333"><input type="number" id="username"  required></td>
                </tr><tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      City:</strong> </span></td>
                <td width="333"><input type="text" id="city" required></td>
                </tr>
                <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      Address:</strong> </span></td>
                <td width="333"><input type="text" id="username"  required></td>
                </tr>
                <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong>      Phone:</strong> </span></td>
                <td width="333"><input type="tel" id="username" ></td>
                </tr>
                <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong> Access Control:</strong> </span></td>
                <td width="333"><select>
                  <option selected disabled>Select User Role</option>
                  <option value="administrator">Administrator</option>
                  <option value="doctor">Doctor</option>
                  <option value="accountant">Accountant</option>
                  <option value="receptionist">Receptionist</option>
                  <option value="lab_manager">Lab Manager</option>
                </select></td>
                </tr>
                <tr>
                <td width="272" height="55"><span style="font-size: 1.2em"><strong> Branch Name:</strong> </span></td>
                <td width="333"><select style="width: 70%">
                  <option selected disabled>Select Branch</option>
                  <option value="dha">DHA</option>
                  <option value="gulberg">Gulberg</option>
                  <option value="canal_view">Canal View</option>
                  <option value="garden_town">Garden Town</option>
                  <option value="johar_town">Johar Town</option>
                </select></td>
                </tr>
                <tr>
                <td width="272"><span style="font-size: 1.2em;"><strong>Additional Info:</strong> </span></td>
                <td width="333" height="200"><textarea style="font-size: 1.2em; margin-top: 2px; resize: none;"></textarea></td>
                </tr>
                <tr> 
                <td colspan="2"> 
                    <center>
                    <div class="btn-wrap">
                        <a class="btn_3" href="javascript:document.getElementById('regForm').reset();" data-type="reset">Reset</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a class="btn_3" href="#" data-type="submit">Register</a>
                    </div>
                </center>
                </td>
                </tr>
            </table>
            </form>
            </div>
        </center>
		
		<br><br>

      <div class="container">
            <div class="row wrap_9 wrap_4 wrap_10">
                <div class="grid_12">
                    <div class="header_1 wrap_3 color_3">
                        Get in Touch
                    </div>
                    <div class="box_3">
                        <ul class="list_1">
                            <li><a class="fa fa-twitter" href="#"></a></li>
                            <li><a class="fa fa-facebook" href="#"></a></li>
                            <li><a class="fa fa-google-plus" href="#"></a></li>
                            <li><a class="fa fa-pinterest" href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop