<?php session_start(); ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="jumbotron">
    <h1 class="display-3">Wellcome to VoteApp admin view</h1>
    <?php if (isset($_SESSION['logged_in'])): ?>
        <p>You are logged in as <?php echo $_SESSION['username']; ?></p>
    <?php endif; ?>
</div>

<div class="container">

    <div id="msg" class="alert alert-dismissible alert-warning d-none">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading"></h4> 
        <p class="mb-0"></a></p>
    </div>

    <h2>Votes</h2>
    <button class="btn btn-info" onclick="showPolls(data,'current')">Current polls</button>
    <button class="btn btn-info" onclick="showPolls(data,'old')">Old polls</button>
    <button class="btn btn-info" onclick="showPolls(data,'future')">Future polls</button>
    <ul id="votesUl" class="list-group">
    </ul>

</div>


<script src="js/admin.js"></script>
<script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>