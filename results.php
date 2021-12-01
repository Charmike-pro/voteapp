<?php session_start(); ?>
<?php
if (!isset($_GET['id'])){
   header('location: index.php'); 
}
$id = intval($_GET['id']);

?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">
    <div class="row">
    <h1></h1>
    </div>
    
    <div class="row">
        <div class="col">
            <ul id="optionsUl" class="list-group"></ul>
        </div>
        <div class="col">
        <canvas id="pollChart" ></canvas>
        </div>
    </div>
</div>


<script src="js/common.js"></script>
<script src="js/results.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

<?php include_once 'layout/bottom.inc.php';?>