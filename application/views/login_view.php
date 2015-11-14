<div id="login-form" class="panel panel-default">
    <div id="login-form-title" class="panel-heading">
        <h4>Login</h4>
    </div>
    <div id="form-div" class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>user/authenticate">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Enter Username" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password"/>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>

<br/>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Dropdown
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>

<a href="<?php echo base_url(); ?>">Back to Home</a>
