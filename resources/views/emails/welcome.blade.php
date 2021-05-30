<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
	Hello {{ $user['firstname'] }}<br/>
	Welcome to the Pet App<br/>
	Your registered email-id is {{ $user['email'] }}<br/>
	Thank's<br/>
	Pet
</body>
 
</html>