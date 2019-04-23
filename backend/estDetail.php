<?php
//enable db connection 
include "dbcon.php";
//check if user is logged in
checklogin();
//get the current user info
include('getUser.php');
//check whether a client is trying to access this section. If so, terminate their session and redirect them to index page.
if($role=='Client'){
session_destroy();
header('Location: index.php');
}

?>
<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
This code was altered from https://css-tricks.com/html-invoice/, see below for breakdown
-->
<html>
	<head>
		<meta charset="utf-8">
        <!-- Make title of page the name of the user's estimate with id. e.g. 'Edmont Traci's Estimate #N2019'   -->
		<title><?php include("estGetDetail.php");  echo"$name's "; ?>Estimate <?php include("estGetDetail.php");  echo" - #N$estID "; ?> </title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<link rel="license" href="../assets/bootstrap/css/bootstrap.min.css">
		<!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script src="script.js"></script>
	</head>
	<body>
        <?php 
        include("estToInv.php");
        ?> 

        <div>
        <!-- The code below has been altered majorly from the original source mentioned above-->
        <form name="vatCalc" id="form" method="post">
		<header>  
            <div>
                <div class="pull-left">
                    <button style="height:30px;width:30px;margin-top:-42px; margin-left:-10px;"  onclick="window.history.go(-1); return false;" class="button button4 return" > <i style="font-size:30px" class="fa fa-fw fa-chevron-circle-left"></i> 
                    </button>
                </div>
                <div class="center">
                    <button style="color:green;height:30px;width:670px;margin-top:-40px;" class="button button4 return" type="submit" name="submit" value="Register"  value="Register" id="submit"> <i style="font-size:30px;" class="fa fa-fw fa-check-circle"></i> 
                    </button>
                </div>
                <div class="pull-right">
                    <i class="return" style="color:#00baff;font-size:30px;"> 
                        <a style="height:30px;width:30px;margin-top:-43px;text-decoration:none;" class="fa fa-fw fa-edit" onclick="location.href='editEstimate.php?id=<?php include('estGetDetail.php'); echo"$estID"; ?>'"></a>
                    </i> 
                </div>
            </div>
			<h1>Estimate</h1>
            <p style="font-size: 14px;"><?php include('getUser.php'); echo"$fname $sname"; ?>
            </p>
			<address contenteditable>
				<p>Trust Troci Construction LTD
                <br> 70 Church Leys,
                <br> Harlow, 
                <br> CM18 6DB</p>
				<p>07403059234</p>
			</address>
            <span style="width:35%; margin-top:-15px;"><img alt="" src="../assets/img/TROCI!.png"><input type="file" accept="image/*"></span>  
		</header>
		<article>
			<h1>Recipient</h1>
            <table class="meta" style="margin-left:28%;">
				<tr>
					<th><span>Estimate No.</span></th>
					<td>
                        <div style="text-align:right; width:100%;"><span><?php include("estGetDetail.php"); echo"#N$estID"; ?></span></div>
                        <input hidden name="estID" value="<?php include("estGetDetail.php"); echo"$estID"; if(isset($_POST['estID'])) echo $_POST['estID'];?>"></td>
				</tr>
				<tr>
				<th><span>Date</span></th>
					<td><input readonly style="text-align:right; width:100%;" class="pull-right"  id="date" name="date"  value="<?php echo gmdate("Y-m-d"); ?>">
                        </td>
				</tr>
				<tr>
					<th><span>Total</span></th>
					<td><span>£<input readonly="readonly" style="text-align:right; width:90%;" class="pull-right" type="number" min="0" step="0.01" value="<?php include("estGetDetail.php"); echo"$bal"; ?>" name="total1" id="total1" > </span><span></span></td>
				</tr>
            </table>
			<table class="meta">
				<tr>
					<th>
                        <span>Client Name</span>
                    </th>
					<td>
                        <span id="clientName"> <input readonly="readonly" style="width:139px" name="clientName" value="<?php include("estGetDetail.php"); echo"$name"; ?>" value="<?php if(isset($_POST['clientName'])) echo $_POST['clientName']; ?>"> </span>
                    </td>
				</tr>
				<tr>
					<th>
                        <span>Address</span>
                    </th>
					<td>
                        <span name="address"><input readonly="readonly" style="width:139px" name="address" value="<?php include("estGetDetail.php"); echo"$add"; ?>" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
                        </span>
                    </td>
				</tr>
				<tr>
					<td style="border:none;" >
                        <span> </span>
                        <span></span>
                    </td>
					<td >
                        <span name="town"><input readonly="readonly" style="width:139px" name="town" value="<?php include("estGetDetail.php"); echo"$town"; ?>" value="<?php if(isset($_POST['town'])) echo $_POST['town']; ?>"> </span>
                        <span></span>
                    </td>
				</tr>
                <tr>
					<td style="border:none;">
                        <span></span>
                        <span></span>
                    </td>
					<td>
                        <span name="postcode">    
                            <input readonly="readonly" style="width:139px" name="postcode" value="<?php include("estGetDetail.php"); echo"$pcode"; ?>" value="<?php if(isset($_POST['postcode'])) echo $_POST['postcode']; ?>"> 
                        </span>
                        <span></span>
                    </td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th style="width:70%;"><span>Description</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
                        <td>
                            <span id="Descr"> 
                                <input readonly="readonly" rows="1" style="width:490px" name="Descr" value="<?php include("estGetDetail.php"); echo"$desc"; ?>" value="<?php if(isset($_POST['Descr'])) echo $_POST['Descr']; ?>" required> 
                            </span>
                        </td>
						<td>				
                            <span id="clientName">£ 
                                <input readonly="readonly" class="pull-right" style="text-align:right; width:90%;" onblur="pertot()" value="<?php include("estGetDetail.php"); echo"$descprice"; ?>" name="qty[]" id="qty1" value="<?php if(isset($_POST['qty[0]'])) echo $_POST['qty[0]']; ?>" required> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr1"> 
                                <input readonly="readonly" rows="1" style="width:490px" name="Descr1" value="<?php include("estGetDetail.php"); echo"$desc1"; ?>" value="<?php if(isset($_POST['Descr1'])) echo $_POST['Descr1']; ?>"> 
                            </span>
                        </td>
						<td>				
                            <span id="clientName">£ 
                                <input readonly="readonly" class="pull-right" style="text-align:right; width:90%;" onblur="pertot()" value="<?php include("estGetDetail.php"); echo"$descprice1"; ?>" name="qty[]" id="qty2" value="<?php if(isset($_POST['qty[1]'])) echo $_POST['qty[1]']; ?>" required> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr2"> 
                                <input readonly="readonly" rows="1" style="width:490px" name="Descr2" value="<?php include("estGetDetail.php"); echo"$desc2"; ?>" value="<?php if(isset($_POST['Descr2'])) echo $_POST['Descr2']; ?>"> 
                            </span>
                        </td>
						<td>				
                            <span id="clientName">£ 
                                <input readonly="readonly" class="pull-right" style="text-align:right; width:90%;" onblur="pertot()" value="<?php include("estGetDetail.php"); echo"$descprice2"; ?>" name="qty[]" id="qty3" value="<?php if(isset($_POST['qty[2]'])) echo $_POST['qty[2]']; ?>" required> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr3"> 
                                <input readonly="readonly" rows="1" style="width:490px" name="Descr3" value="<?php include("estGetDetail.php"); echo"$desc3"; ?>" value="<?php if(isset($_POST['Descr3'])) echo $_POST['Descr3']; ?>"> 
                            </span>
                        </td>
						<td>				
                            <span id="clientName">£ 
                                <input readonly="readonly" class="pull-right" style="text-align:right; width:90%;" onblur="pertot()" value="<?php include("estGetDetail.php"); echo"$descprice3"; ?>" name="qty[]" id="qty4" value="<?php if(isset($_POST['qty[3]'])) echo $_POST['qty[3]']; ?>" required> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr4"> 
                                <input readonly="readonly" rows="1" style="width:490px" name="Descr4" value="<?php include("estGetDetail.php"); echo"$desc4"; ?>" value="<?php if(isset($_POST['Descr4'])) echo $_POST['Descr4']; ?>"> 
                            </span>
                        </td>
						<td>				
                            <span id="clientName">£ 
                                <input readonly="readonly" class="pull-right" style="text-align:right; width:90%;" onblur="pertot()" value="<?php include("estGetDetail.php"); echo"$descprice4"; ?>" name="qty[]" id="qty5" value="<?php if(isset($_POST['qty[4]'])) echo $_POST['qty[4]']; ?>" required> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr5"> 
                                <input readonly="readonly" rows="1" style="width:490px" name="Descr5" value="<?php include("estGetDetail.php"); echo"$desc5"; ?>" value="<?php if(isset($_POST['Descr5'])) echo $_POST['Descr5']; ?>"> 
                            </span>
                        </td> 
						<td>				
                            <span id="clientName">£ 
                                <input readonly="readonly" class="pull-right" style="text-align:right; width:90%;" onblur="pertot()" value="<?php include("estGetDetail.php"); echo"$descprice5"; ?>" name="qty[]" id="qty6" value="<?php if(isset($_POST['qty[5]'])) echo $_POST['qty[5]']; ?>" required> 
                            </span>
                        </td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th>Total</th>
					<td>
                        <span>£
                            <input readonly="readonly" name="total" style="width:100px; text-align:right;" type="number" name="totalval"  id="totalval" value="<?php include("estGetDetail.php"); echo"$total"; ?>" value="<?php if(isset($_POST['total'])) echo $_POST['total']; ?>" >
                        </span>
                    </td>
				</tr>
				<tr>
					<th><span contenteditable>VAT @20%</span></th>
					<td>
                        <span>£
                            <input readonly="readonly" type="text" onblur="VATnull()" style="width:100px; text-align:right;" name="inideposit" value="<?php include("estGetDetail.php"); echo"$vat"; ?>" id="inideposit" value="<?php if(isset($_POST['inideposit'])) echo $_POST['inideposit']; ?>">
                        </span>
                    </td>
				</tr>
				<tr>
					<th><span >Balance Due</span></th>
					<td>
                        <span>£
                        <input readonly="readonly" type="number" style="width:100px; text-align:right;" name="remainingval" id="remainingval" value="<?php include("estGetDetail.php"); echo"$bal"; ?>" value="<?php if(isset($_POST['remainingval'])) echo $_POST['remainingval']; ?>">
                        </span>
                    </td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p> Thank you for choosing Troci Construction to provide you with a quotation. Welcome home to quality. </p>
            </div>
		</aside>
        </form>
            <script>
                function pertot(){
                        findTotal();
                        VAT();
                        updateDue();
                    }
            </script>
        </div>
	</body>
</html>


<!-- The code below has been altered from https://css-tricks.com/html-invoice/-->
<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
/* reset */
*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
    
}
    
/* unvisited link */
a:link {
    color: black;
}

/* visited link */
a:visited {
    color: black;
}

/* mouse over link */
a:hover {
    color: black;
}

/* selected link */
a:active {
    color: black;
}
    

    
    
/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #daf6ff; border-color: #ade9ff; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #d8d8d8; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }


/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.return
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}


tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
    .return { display: none; }
}

@page { margin: 0; }

</style>
<style>

    .button4 {
    background-color: rgba(255, 255, 255, 0);
    color: black;

    }

</style>



<script>
function findTotal(){
    var arr = document.getElementsByName('qty[]');
    var tot=0.00;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);
    }
    document.getElementById('totalval').value = tot.toFixed(2);
    document.getElementById('total1').value = tot.toFixed(2);
}
        function updateDue() {

    var total = parseFloat(document.getElementById("totalval").value);
    var val2 = parseFloat(document.getElementById("inideposit").value);

    // to make sure that they are numbers
    if (!total) { total = 0; }
    if (!val2) { val2 = 0; }

    var ansD = document.getElementById("remainingval");
    ansD.value = ((total/100 * 20)+total).toFixed(2);

}
            function VAT() {

    var total = parseFloat(document.getElementById("totalval").value);


    // to make sure that they are numbers
    if (!total) { total = 0; }

    var ansD = document.getElementById("inideposit");
    ansD.value = (total/100 * 20).toFixed(2);

}
    //This code has been added by author in order to calculate the total without the VAT being included.
    
                function VATnull() {

    var total = parseFloat(document.getElementById("totalval").value);
    var vat = parseFloat(document.getElementById("inideposit").value);
    var vat1 = String(document.getElementById("inideposit").value);


    if(vat=='0' || vat1=='INC' || vat1=='inc'){
        
           var ansD = document.getElementById("remainingval");
            ansD.value = (total).toFixed(2);
    }
}
    

</script>
