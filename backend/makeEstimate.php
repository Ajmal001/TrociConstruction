<?php
//connect to the database
include "dbcon.php";
//chech whether user has logged ins
checklogin();
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
		<title>Create an Estimate</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<link rel="license" href="../assets/bootstrap/css/bootstrap.min.css">
		<!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../backend/css/jquery-editable-select.min.css" rel="stylesheet" />
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script src="script.js"></script>
	</head>
    
	<body>
        <!-- Include the php file to post the form -->
        <?php include("postEstimates.php") ?> 
        <div>
        <!-- The code below has been altered majorly from the original source mentioned above-->
        <form name="vatCalc" id="form" method="post">
		<header>       
            <div class="pull-left">
                <button style="height:30px;width:30px;margin-top:-42px; margin-left:-10px;"  onclick="window.history.go(-1); return false;" class="button button4 return" > <i style="font-size:30px" href="estimate.php" class="fa fa-fw fa-chevron-circle-left"></i> </button>
            </div>
            <div class="pull-right">
                <button style="color:#00baff;height:30px;width:30px;margin-top:-42px;" class="button button4 return" type="submit" name="submit" value="Register"  value="Register" id="butonas"> <i style="font-size:30px;" class="fa fa-fw fa-save"></i> </button>
            </div>
			<h1>Estimate</h1>
            <p style="font-size: 14px;"><?php include('getUser.php'); echo"$fname $sname"; ?></p>
			<address contenteditable>
				<p>Trust Troci Construction LTD
                <br>70 Church Leys,
                <br> Harlow, 
                <br> CM18 6DB</p>
				<p>07403059234</p>
			</address>
            <span style="width:35%; margin-top:-15px;">
                <img alt="" src="../assets/img/TROCI!.png">
                <input type="file" accept="image/*">
            </span>  
          
		</header>
		<article>
			<h1>Recipient</h1>
            <table class="meta" style="margin-left:28%;">
				<tr>
					<th>
                        <span>Estimate No.</span>
                    </th>
					<td>
                        <div style="text-align:right; width:100%;">
                            <span>
                                <?php include("getRefNo.php"); echo" #N$estRef"; ?>
                            </span>
                        </div>
                        <input hidden name="estID" value="<?php if($estRef > 0){ include("getRefNo.php"); echo"$estRef"; if(isset($_POST['estID'])) echo $_POST['estID'];} else { $estRef = '0';}?>">
                    </td>
				</tr>
				<tr>
					<th>
                        <span>Date</span>
                    </th>
					<td>
                        <input style="text-align:right; width:100%;" class="pull-right"  id="date" name="date"  value="<?php echo gmdate("Y-m-d"); ?>">
                    </td>
				</tr>
				<tr>
					<th>
                        <span>Total</span>
                    </th>
					<td>
                        <span>£
                            <input readonly="readonly" style="text-align:right; width:90%;" class="pull-right" type="number" min="0" step="0.01" value='0.00' name="total1" id="total1" > 
                        </span>
                        <span></span>
                    </td>
				</tr>
            </table>
			<table class="meta">
				<tr>
					<th>
                        <span>Client Name</span>
                    </th>
					<td>
                        <span id="clientName">             
                            <select name="clientName" value="<?php if(isset($_POST['clientName'])) echo $_POST['clientName']; ?>" style="width:118px" id="slide">
                            <?php
                                $mysqlserver="localhost";
                                $mysqlusername="root";
                                $mysqlpassword="";
                                $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());

                                $dbname = 'TROCI';
                                mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());

                                $cdquery="SELECT * FROM clients";
                                $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

                                while ($cdrow=mysql_fetch_array($cdresult)) {
                                $fname=$cdrow["firstname"];
                                $sname=$cdrow["surname"];
                                $id=$cdrow["client_id"];
                                    echo "<option>$fname $sname                    $id</font></option>";
                                }
                                ?>         
                            </select>      
                        </span>
                    </td>
				</tr>
				<tr>
					<th>
                        <span>Address</span>
                    </th>
					<td>
                        <span name="address"><input style="width:139px" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>"></span>
                    </td>
				</tr>
				<tr>
					<td style="border:none;" >
                        <span> </span>
                        <span></span>
                    </td>
					<td >
                        <span name="town"><input style="width:139px" name="town" value="<?php if(isset($_POST['town'])) echo $_POST['town']; ?>"> </span>
                        <span></span>
                    </td>
				</tr>
                <tr>
					<td style="border:none;">
                        <span> </span>
                        <span></span>
                    </td>
					<td>
                        <span name="postcode">    
                            <input style="width:139px" name="postcode" value="<?php if(isset($_POST['postcode'])) echo $_POST['postcode']; ?>"> 
                        </span>
                        <span></span>
                    </td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th style="width:70%;">
                            <span>Description</span>
                        </th>
						<th>
                            <span >Price</span>
                        </th>
					</tr>
				</thead>
				<tbody>
					<tr>
                        <td>
                            <span id="Descr"> 
                                <textarea rows="1" style="width:490px" name="Descr" value="<?php if(isset($_POST['Descr'])) echo $_POST['Descr']; ?>" required></textarea> 
                            </span>
                       </td>
						<td>
                            <span name="descPrice" data-prefix>£ </span>
                            <span> 
                                <input class="pull-right" style="text-align:right; width:90%;" onblur="pertot()" type="number" min="0" step="0.01" value='0.00' name="qty[]" id="qty1" value="<?php if(isset($_POST['qty[0]'])) echo $_POST['qty[0]']; ?>" required> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr1"> 
                                <textarea rows="1" style="width:490px" name="Descr1" value="<?php if(isset($_POST['Descr1'])) echo $_POST['Descr1']; ?>"></textarea> 
                            </span>
                        </td>
						<td>
                            <span name="descPrice" data-prefix>£</span>
                            <span> 
                                <input style="text-align:right; width:90%;" class="pull-right" onblur="pertot()" type="number" step="0.01" value='0.00' name="qty[]" id="qty2" value="<?php if(isset($_POST['qty[1]'])) echo $_POST['qty[1]']; ?>"> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr2"> 
                                <textarea rows="1" style="width:490px" name="Descr2" value="<?php if(isset($_POST['Descr2'])) echo $_POST['Descr2']; ?>"></textarea> 
                            </span>
                        </td>
						<td>
                            <span name="descPrice" data-prefix>£</span>
                            <span> 
                                <input style="text-align:right; width:90%;" class="pull-right" onblur="pertot()" type="number" step="0.01" value='0.00' name="qty[]" id="qty3" value="<?php if(isset($_POST['qty[2]'])) echo $_POST['qty[2]']; ?>"> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr3"> 
                                <textarea rows="1" style="width:490px" name="Descr3" value="<?php if(isset($_POST['Descr3'])) echo $_POST['Descr3']; ?>"></textarea> 
                            </span>
                        </td>
						<td>
                            <span name="descPrice" data-prefix>£</span>
                            <span> 
                                <input style="text-align:right; width:90%;" class="pull-right" onblur="pertot()" type="number" step="0.01" value='0.00' name="qty[]" id="qty4" value="<?php if(isset($_POST['qty[3]'])) echo $_POST['qty3']; ?>"> 
                            </span>
                        </td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr4"> 
                                <textarea rows="1" style="width:490px" name="Descr4" value="<?php if(isset($_POST['Descr4'])) echo $_POST['Descr4']; ?>"></textarea> 
                            </span>
                        </td>
						<td>
                            <span name="descPrice" data-prefix>£</span><span> <input style="text-align:right; width:90%;" class="pull-right" onblur="pertot()" type="number" step="0.01" value='0.00' name="qty[]" id="qty5" value="<?php if(isset($_POST['qty[4]'])) echo $_POST['qty[4]']; ?>"> </span></td>
					</tr>
                    <tr>
                        <td>
                            <span id="Descr5"> 
                                <textarea rows="1" style="width:490px" name="Descr5" value="<?php if(isset($_POST['Descr5'])) echo $_POST['Descr5']; ?>"></textarea> 
                            </span>
                        </td> 
						<td>
                            <span name="descPrice" data-prefix>£</span> 
                            <input style="text-align:right; width:90%;" class="pull-right" onblur="pertot()" type="number" step="0.01" value='0.00' name="qty[]" id="qty6" value="<?php if(isset($_POST['qty[5]'])) echo $_POST['qty[5]']; ?>">
                        </td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th>Total</th>
					<td>
                        <span>£
                            <input readonly="readonly" name="total" style="width:100px; text-align:right;" type="number" name="totalval"  id="totalval" value='0.00' value="<?php if(isset($_POST['total'])) echo $_POST['total']; ?>" >
                        </span>
                    </td>
				</tr>
				<tr>
					<th>
                        <span contenteditable>VAT @20%</span>
                    </th>
					<td>
                        <span>£
                            <input type="text" onblur="VATnull()" style="width:100px; text-align:right;" name="inideposit" value='0.00' id="inideposit" value="<?php if(isset($_POST['inideposit'])) echo $_POST['inideposit']; ?>">
                        </span>
                    </td>
				</tr>
				<tr>
					<th>
                        <span >Balance Due</span>
                    </th>
					<td>
                        <span>£
                        <input readonly="readonly" type="number" style="width:100px; text-align:right;" name="remainingval" id="remainingval" value='0.00' value="<?php if(isset($_POST['remainingval'])) echo $_POST['remainingval']; ?>">
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
    background-color: white;
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
}
        function updateDue() {

    var total = parseFloat(document.getElementById("totalval").value);
    var val2 = parseFloat(document.getElementById("inideposit").value);

    // to make sure that they are numbers
    if (!total) { total = 0; }
    if (!val2) { val2 = 0; }

    var ansD = document.getElementById("remainingval");
    var ansD1 = document.getElementById("total1");
    ansD.value = ((total/100 * 20)+total).toFixed(2);
    ansD1.value = ((total/100 * 20)+total).toFixed(2);

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


  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../backend/js/jquery-editable-select.min.js"></script>
    <script>
      window.onload = function () {
        $('#slide').editableSelect({ effects: 'slide' });
        $('#html').editableSelect();
        $('#onselect').editableSelect({
          onSelect: function (element) {
            $('#afterSelect').html($(this).val());
          }
        });
      }
    </script>
  
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>