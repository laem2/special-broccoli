
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Login</h2>
        <form action="login.php" method="post" id="login-form">

            <div class="form-input">
                <input type="text" id="username" name="username" placeholder="username" required>
            </div>
            <div class="form-input">
                <input type="password" id="password" name="password" placeholder="mot de passe" required>
            </div>
           
        <!----
        hna u should add a condition or something te3 l authentification so that it wouldnt redirect u to the page based on the userli dar authentification (i think its doable b js or something) since am working just on the first 2 pages for now 7aitit the lin te3 hadik page f href or u can do it b php-->
            <button class="button" type="submit" >Login</button>
        </form>
    </div>
</body>
</html>