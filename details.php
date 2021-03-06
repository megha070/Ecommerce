<!DOCTYPE html>
<?php
include("functions/functions.php");

?>
<html>
<head>
	<title>My Online Shop</title>
	<style type="text/css">
		/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body{
	background: skyblue;
}
.main_wrapper{
	width: 1000px;
	height: auto;
	margin: auto;
	background: black;
}

.header_wrapper{
	width: 1000px;
	height: 100px;
	margin: auto;
}
#logo{
	float: left;
}
#banner{
	float: right;
}
.menubar{
	width: 1000px;
	height: 50px;
	background: gray;
	color: white;
}
#menu{
	padding: 0;
	margin: 0;
	line-height: 40px;
	float: left;
}
#menu li{
	list-style: none;
	display: inline;	
}
#menu a{
	text-decoration: none;
	color: white;
	padding: 8px;
	margin: 5px;
	font-size: 18px;
	font-family: COMIC SANS MS;
}
#menu a:hover{
	color: orange;
	font-weight: bolder;
	text-decoration: underline;
}
#form{
	float: right;
	padding-left:8px;
	padding-right: 8px;
	line-height: 40px; 
}
.content_wrapper{
	width: 1000px;
	
	margin: auto;
	background: pink;
}
#content_area{
	width: 800px;
	
	float: right;
	background: pink;
}
#sidebar{
	width: 200px;
	
	background: black;
	float: left;
}
#sidebar_title {
background:white;
color:black;
font-size:22px;
font-family:arial; 
padding:10px;
text-align:center;
}
#cats{
	text-align: center;
}
#cats li{
	list-style: none;
	margin: 5px;
}
#cats a{
	color: white;
	padding: 8px;
	margin: 5px;
	text-align: center;
	font-size: 20px;
	font-family: comic Sans MS;
	text-decoration: none;
}
#cats a:hover{
color: orange;
font-weight: bolder;
text-decoration: underline;
}

#products_box{
	width: 780px;
	text-align: center;
	margin-left: 30px;
	margin-bottom: 10px;
}
#single_product{
	float: left;
	margin-left: 30px;
	padding: 10px;
}
#single_product img{
	border: 2px solid black;
}
#shopping_cart{
	width: 800px;
	height: 50px;
	background: black;
	color: white;
}
#footer{
	width: 1000px;
	height: 100px;
	background: gray;
	clear: both;
}
	</style>
</head>
<body>
<div class="main_wrapper">
	
<div class="header_wrapper">
	<img id="logo" src="images/logo.gif">
	<img id="banner" src="images/ad_banner.gif">
	
</div>
<div class="menubar">
		
<ul id="menu">
	<li><a href="#">Home</a></li>
	<li><a href="#">Our Products</a></li>
	<li><a href="#">My Account</a></li>
	<li><a href="#">Sign Up</a></li>
	<li><a href="#">Shopping Cart</a></li>
	<li><a href="#">Contact Us</a></li>

</ul>
<div id="form">
	<form method="get" action="results.php" enctype="multipart/form-data">
		<input type="text" name="user_query" placeholder="Search A Product" />
		<input type="submit" name="search" value="Search">

	</form>
</div>

	</div>
<div class="content_wrapper">
	<div id="sidebar">
			
	<div id="sidebar_title">Categories</div>
	<ul id="cats">
		<?php 
		getCats(); ?>
	</ul> 
	
	<div id="sidebar_title">Brands</div>
	<ul id="cats">
		<?php
		getBrands();
		?>

	</ul> 
	</div>

<div id="content_area">

	<div id="shopping_cart">
		<span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">

			Welcome Guest! <b style="color: yellow;">Shopping Cart- </b> Total Items: Total Price: <a href="cart.php" style="color: yellow;">Go To Cart</a>
			

		</span>

	</div>
	<div id="products_box">
		
		<?php
		if (isset($_GET['pro_id'])) {

			$product_id=$_GET['pro_id'];
			$get_pro="select * from products where product_id='$product_id'";

	$run_pro=mysqli_query($con,$get_pro);

	while ($row_pro=mysqli_fetch_array($run_pro)) {
	    $pro_id=$row_pro['product_id'];
	    //$pro_cat=$row_pro['product_cat'];
	    //$pro_brand=$row_pro['product_brand'];
	    $pro_title=$row_pro['product_title'];
	    $pro_price=$row_pro['product_price'];
	    $pro_desc=$row_pro['product_desc'];
	    $pro_image=$row_pro['product_image'];
	    //$pro_id=$row_pro['product_id'];

	    echo "
			<div id='single_product'>
				
					<h3>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='400px' height='300px'/>
					
					<p><b> Price: $ $pro_price </b></p>
					<p><b>$pro_desc</b></p>
					
					<a href='index.php' style='float:left;'>Go Back</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>

	    ";	

	}
		}
		
		?>
	</div>


</div>
</div>

<div id="footer">
<h2 style="text-align: center; padding-top:30px; ">
	&copy; 2018 by Priyanka
</h2>
</div>
</div>
</body>
</html>