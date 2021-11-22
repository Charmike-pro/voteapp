<?php session_start(); ?>
<?php 
if (!isset($_GET['id'])){
    header('Location: index.php');
}

$id = intval($_GET['id']);
?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">

    <h1></h1>

    <ul id="optionsUl" class="list-group">
       
    </ul>

<!-- 
    <li class="list-group-item"><button class="btn btn-lg btn-info">Auto</button></li>
    <li class="list-group-item"><button class="btn btn-lg btn-info">Lentokone</button></li>
    <li class="list-group-item"><button class="btn btn-lg btn-info">Usain Bolt </button></li>

 -->

</div>

<script src="js/common.js"></script>
<script src="js/vote.js"></script>


<?php include_once 'layout/bottom.inc.php'; ?>