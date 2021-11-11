<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">

  <div id="msg" class="alert alert-dismissible alert-warning d-none">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4 class="alert-heading">Warning!</h4> 
    <p class="mb-0"></a></p>
  </div>

  <form name="login">
    <fieldset>
      <legend>Login</legend>
      <div class="form-group">
        <label for="username">Username</label>
        <input name="username" type="text" class="form-control" placeholder="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" placeholder="password">
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </fieldset>
  </form>

</div>

<script src="js/common.js"></script>
<script src="js/login.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>
