
<h1>Jim Registration</h1>
<h2>Please fill out the following</h2>

<form action="/features/auth/AuthController.php" method="POST">
    <label for="first">First Name:</label>
    <input type="text" name="first" id="first">

    <label for="last">Last Name:</label>
    <input type="text" name="last" id="last">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email">

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password">

    <button type="submit" name="register">Register</button>
</form>
