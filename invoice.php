<?php
session_start();
include("db.php");
include("class.dispatch.dao.php");
include("class.company.dao.php");
$dao = new DAOdispatch();
$daoCompany = new DAOcompany();
if(isset($_GET["id"])){
  $vo = $dao->get($_GET["id"]);
  }
$vo_comp  = $daoCompany->getCompanyDetail($vo->carrier,$vo->uid);

$inv_date = date('d/m/Y');

$bal      = ($vo->total) - ($vo->advance);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div style="width:595px;">


<div class="container">



<div class=""row">
<div class="col-sm-10">
</div>

<div class="col-sm-2">
<h1>Invoice</h1>
</div>





<br><br><br><br>
<div class="row">

<div class="col-sm-8">
<p> 
<?php echo $vo->carrier; ?><br><br>
<?php echo $vo_comp->address; ?><br>
<?php echo $vo_comp->city; ?>, <?php echo $vo->state; ?> <?php echo $vo->pin_code; ?><br><br>
</p>
</div>


<div class="col-sm-4">
<table class="table table-bordered">
<thead>
   <tr >
   <th class="text-center"> Date </th>
   <th class="text-center"> Invoice # </th>
   </tr>
</thead> 

<tbody>
   <tr> 
   <td class="text-center"><?php echo $inv_date; ?> </td>
   <td class="text-center"><?php echo $vo->did; ?> </td>
   </tr>

</table>
</div>

</div>











<div class="row">

<div class="col-sm-7">
<table class="table table-bordered">
<thead>
   <tr>
   <th class="text-center"> Phone # </th>
   <th class="text-center"> Fax # </th>
   <th class="text-center"> E-mail </th>
   </tr>
</thead> 

<tbody>
   <tr> 
   <td class="text-center"> <?php echo $vo_comp->phone; ?> </td>
   <td class="text-center"> <?php echo $vo_comp->fax; ?> </td>
   <td class="text-center"> <?php echo $vo_comp->email; ?></td>
   </tr>
</table>
</div>


</div>










<div class="row">

<div class="col-sm-4">
<table class="table table-bordered">
<thead>
   <tr>
   <th class="text-left"> Bill To </th>
  </tr>
</thead> 

<tbody>
   <tr> 
   <td> 
<?php echo $vo->bill_to; ?><br>
<br>
<br>
   </td>
   </tr>

</tbody>
</table>
</div>
</div>














<div class="row">

<div class="col-sm-6">
</div>

<div class="col-sm-6">
<table class="table table-bordered">
<thead>
   <tr>
   <th class="text-center"> Load # </th>
   <th class="text-center"> Terms </th>
   <th class="text-center"> Load Date </th>
   </tr>
</thead> 

<tbody>
   <tr> 
   <td class="text-center"> <?php echo $vo->load_num; ?> </td>
   <td class="text-center"> <?php echo $vo->load_terms; ?> </td>
   <td class="text-center"> <?php echo $vo->creation_date; ?> </td>
   </tr>
</table>
</div>
</div>























<div class="row">

<div class="col-sm-12">
<table class="table table-bordered">

   <tr>
   <th class="text-center"> Item </th>
   <th class="text-center"> Description </th>
   <th class="text-center"> Amount </th>
   </tr> 


   <tr> 
   <td style="height:600px;"> $<?php echo $vo->pay_code; ?> </td>
   <td> From: <?php echo $vo->from_address; ?><BR> To:      <?php echo $vo->to_address; ?> </td>
   <td class="text-right"> <?php echo $vo->rate; ?></td>
   </tr>

</table>
</div>
</div>














<div class="row">

<div class="col-sm-6">
Thank you for your business.
</div>

<div class="col-sm-6">
<table class="table table-bordered">
<thead>

    <tr>
    <th> Total </th>
    <td class="text-right"> $<?php echo $vo->total; ?> </td>
    </tr>


   <tr>
   <th> Advance </th>
   <td class="text-right"> $<?php echo $vo->advance; ?> </td>
   </tr>


    <tr> 
   <th> Balance due </th>
   <td class="text-right"> $<?php echo $bal; ?> </td>
   </tr>
</table>
</div>
</div>






</div>
</div>
</body>
</html>