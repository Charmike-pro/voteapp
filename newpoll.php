<?php session_start(); ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">

  <div id="msg" class="alert alert-dismissible alert-warning d-none">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4 class="alert-heading">Warning!</h4> 
    <p class="mb-0"></a></p>
  </div>

  <form name="newPoll">
    <fieldset>
      <legend>Create new poll</legend>
      <div class="form-group">
        <label for="topic">Topic</label>
        <input name="topic" type="text" class="form-control" placeholder="topic">
      </div>
      <div class="form-group">
        <label for="start">Start</label>
        <input name="start" type="datetime-local" class="form-control">
      </div>
      <div class="form-group">
        <label for="end">End</label>
        <input name="end" type="datetime-local" class="form-control">
      </div>

      <h4>Poll options</h4> <button class="btn btn-primary" id="addOption">Add option</button>
      <div class="form-group">
        <label for="option1">Option 1</label>
        <input name="option1" type="text" class="form-control" placeholder="Option 1">
      </div>
      <div class="form-group">
        <label for="option2">Option 2</label>
        <input name="option2" type="text" class="form-control" placeholder="Option 2">
      </div>
      <!-- Additional options go here -->

    </fieldset>
    <button type="submit" class="btn btn-primary">Save Poll</button>
    <button class="btn btn-warning" id="deleteLastOption">Delete last option</button>
  </form>

</div>

<script src="js/newPoll.js"></script>
<script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>
