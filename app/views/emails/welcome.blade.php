<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


    <section id="content">

				<h1>Welcome {{ $name }} to Electronic Medical Records!</h1><br>
                Please click on : {{ $link }} to Login.
                <br/><br/>
                Regards!
                EMR Team

                <p>
                    © <span ></span> <a href="{{ URL::to('/') }}">Electronic Medical Records</a> <br/>
                    Website designed by <a href="" rel="nofollow">EMR Team - VU Software House</a>
                </p>

    </section>

</body>
</html>