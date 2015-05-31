<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


    <section id="content">

				<h1>{{ $name }} Message!</h1><br>
                <p>{{ $text }}</p>
                <br/>
                <p>Email: {{ $email }}</p>
                <p>Phone: {{ $phone }}</p>
                <p>
                    © <span ></span> <a href="{{ URL::to('/') }}">Electronic Medical Records</a> <br/>
                    Website designed by <a href="" rel="nofollow">EMR Team - VU Software House</a>
                </p>

    </section>

</body>
</html>