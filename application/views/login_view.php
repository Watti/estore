Login Page

<br/>
<br/>

<form id="login-form" method="post" action="<?php echo base_url(); ?>user/authenticate">
    <label for="username">Username</label>
    <br/>
    <input type="text" name="username" placeholder="Enter Username"/>
    <br/>
    <label for="password">Password</label>
    <br/>
    <input type="password" name="password" placeholder="Enter Password"/>
    <br/>
    <input type="submit" value="Login"/>
</form>

<br/>

<a href="<?php echo base_url(); ?>">Back to Home</a>
