<html>
    <body onload="window.print()">
        <img src='./images/logo_new1.jpg'/>
        <center>
            <h1> Prescription </h1>
        </center>
        <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>

            <tr>
                <td height='20'><label>Patient Name:</label></td>
                <td><label> {{ $patient->name }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Patient ID:</label></td>
                <td><label>{{ $patient->patient_id }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Visit Date:</label></td>
                <td><label> {{ $date }} </label></td>
            </tr>
            <tr>
                <td height='20'><label>Visit Time:</label></td>
                <td><label> {{  $time }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Doctor Name:</label></td>
                <td><label>{{ $doctor_name }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Prescription Code:</label></td>
                <td><label> {{ $prescription->code }}</label></td>
            </tr>
            <tr>
                <td height='20'> <label>Medicines:</label></td>
                <td><label> {{ $prescription->medicines }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Note:</label></td>
                <td><label> {{ $prescription->note }}</label></td>
            </tr>
        </table>
    </body>
</html>