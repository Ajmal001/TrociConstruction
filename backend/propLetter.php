<?php
//connecting to the db
include "dbcon.php";
//checking whether the user is logged in
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
		<title> Letter </title>
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
        
    <!-- included the intro true file so the id of the relevant project can be sent to it. -->
    <?php include("introTrue.php"); ?>
        <div>
        <!-- The code below has been altered majorly from the original source mentioned above-->
        <form name="vatCalc" id="form" method="post">
		<header>  
            <div>
                <div class="pull-left">
                    <button style="height:40px;width:40px;margin-top:-42px; margin-left:-10px;"  onclick="window.history.go(-1); return false;" class="button button4 return" > <i style="font-size:30px" class="fa fa-fw fa-chevron-circle-left"></i> </button>
                </div>
            </div>
            <div class="pull-right">
                <button style="color:#00baff;height:40px;width:40px;margin-top:-42px;" class="button button4 return" type="submit" name="sent" value="TRUE" id="butonas"> <i style="font-size:30px;" class="fa fa-fw fa-envelope"></i> </button>
            </div>
            <span style="position:absolute; width:290px; margin-top:10px; margin-left:-5px;">
                <img alt="" src="../assets/img/TROCI!.png">
                <input type="file" accept="image/*">
            </span>
		</header>
		<article>
            <table class="meta" style="margin-right:-10px;margin-top:-40px;font-family: Times New Roman, Times, serif;font-size: 15px;">
                <tr>
                    <td>
                        <address contenteditable>
                            <p>Trust Troci Construction LTD<br> www.TrociConstruction.co.uk<br>70 Church Leys,<br> Harlow, <br> CM18 6DB </p>
                            <?php echo "" . date("l") . " " . date("d") . " " . date("M") . " " . date("Y") . "";?>
                        </address>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                  <td>
                      <span style="line-height:22px; 5px;font-family: Times New Roman, Times, serif;font-size: 15px; margin-top:15px;"  name="town">
                        <div >
                            <?php include("getProjInfo.php"); 
                                    list ($address, $address1, $address2, $town1, $postcode1, $postcode2) = explode(' ', $add);
                                    echo"<p contenteditable >Dear Property Owner, <br>$address $address1 $address2 <br>$town1 <br>$postcode1 $postcode2 </p>";
                            ?>
                        </div>
                      </span>
                    </td>
                </tr>
            </table>
			<table>
		      <aside>
                <div contenteditable>
                    <br>
                    <p style="line-height: 22px;margin-top:7%; font-family: Times New Roman, Times, serif;serif;font-size: 15px;"> Welcome to Troci Construction, we are here to assist in making sure your property is your happy place. At TC we focus on making sure the customer is hand in hand with the development of their property. For this we have developed an online system that ensures the client is always in the loop no matter where they are. The system has various features and we provide various services, to find out more feel free to visit our webpage above. 
                        <br>
                        <br>
                            It is our aim to ensure, even from this early stage that we can be as efficient and helpful as possible in providing you with all you need to know.
                            We aim to include even the finest details in order to ensure you can stick to budget & are not left with any ‘hidden’ extras like many of our competitors do. That said, we ensure we are very flexible and accommodating, as with all customers, we want you to be 100% satisfied! 
                        <br>
                        <br>
                    For us to generate a quotation we'll need to book you a meeting in order to inspect the property, discuss the project and also review any related documentation. Please don't hesitate to contact us if you have any questions at all or if you need a quotation. </p>
                </div>
		      </aside>
			</table>
			<table class="balance">
				<span  name="town">
                    <div style="line-height: 5px;font-family: Times New Roman, Times, serif;font-size: 15px; margin-top:70px;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p contenteditable > Yours faithfully,</p>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <p contenteditable > Edmont Traci</p>
                    <p contenteditable > (Director)</p>
                    </div>
                 </span>
			</table>
		</article>
        </form>
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
	box-sizing: 0;
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
    border-collapse: collapse;
    
}

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }


body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }


header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }


/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }


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