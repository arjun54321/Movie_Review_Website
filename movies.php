<?php
include("connection.php");
error_reporting(1);
$uid=$_GET['uid'];
// echo "<script>console.log($id)</script>";
$query="SELECT * FROM MOVIES";
$data=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
    <head>
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/1.css">
      	<meta charset="utf-8">
      	<meta lang="en-US">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">      	
      	<title>movies</title>
      	<style>
        	*{
           box-sizing: border-box;
          }
          body{
        	background-color: #333;
        	margin: 0;
        	padding: 0;
          }
          .col-1{
            width:8.333333333333333%;
          }
          .col-2{
            width:16.66666666666667%;
          }
          .col-3{
            width:25%;
          }
          .col-4{
            width:33.33333333333333%;
          }
          .col-5{
            width:41.66666666666667%;
          }
          .col-6{
            width:50%;
          }
          .col-7{
            width:58.33333333333333%;
          }
          .col-8{
            width:66.66666666666666%;
          }
          .col-9{
            width:75%;
          }
          .col-10{
            width:83.33333333333333%;
          }
          .col-11{
            width:91.66666666666666%;
          }
          .col-12{
            width:100%;
          }
          .header,.aside,.nav,.section,.footer{
            float:left;
          }
          .header{
            overflow: hidden;
            background-color: #333;
            height:60px;
          }
          .aside{
            background-color: #333;
          }
          .section{
          	background-color: #333;
          	color: white;
          }
          ul{
              list-style:none;
              margin:0;
              padding:0;
          }
          li{
              float:left;
              height:60px;
              text-align:center;
              padding-top:17px;
          }
          .fm1{
          	padding-top:15px;
          }
          hr{ 
              /*margin-left:auto;
              margin-right:auto;*/
              display: block;
              margin-top: 0.5em;
              margin-bottom: 0.5em;
              width:90%;
              /*margin-left:154px;*/
              border-style: inset;
              border-width: 0.5px;
              float: left;
          }
          .nm{
           	margin-left:47%;
          }
          .fm2{
            display: none;
          }
          .mySlides{
             width:100%;
             height:400px;
          } 
          .image{
              /*position: relative;*/
              margin-left: 152px;
               
          }
          .my{
              margin:5px;
              margin-top:10px; 
              width:120px;
              height:150px;
          }
          .mname{
                position: absolute;
                font-size: 13px;
                /*top:665px;*/
                /*left: 0;*/
                width: 120px;
                height: 20px;
                text-align: center;
                /*left:142px;*/
                background: rgba(0,0,0,.49);
                padding-top: 2px;
                margin-left:5px;
                margin-top:-25px;
        }
          /*start phone responsive*/
          @media only screen and (max-width:600px)
          {
          	body{
          overflow-x: hidden;	
          }
          .header,.nav,.section,.footer{
              margin:0;
          }
          .col-2{
          	width: 100%;
          }
          .col-1{
          	width: 100%;-x
          	background-color: #333;
          	border-bottom: 1px solid green;
          }
          .col-6{
          	background-color: #333;
          	margin-left: 15px;
          	width: 100%;
          }
          hr { 
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            /*width: 100%;*/
            /*margin-left:-5px;*/
            border-style: inset;
            border-width: 0.5px;
            float: left;
          }
          input[type="text"]{ 
                    width: 96%;
          }
          .len button{
          	display: none;
          }
          .header {
          	  width: 100%;
      		    overflow: visible;
      		    background-color: #333;
      		    height:60px;
          } 
           .aside{
          	margin-top:266px;
          }
          .section{
            float:left;
          }
          .nm{
          	margin-left: 40%;
          } 
          .fm2{
            display: block;
            width: 100%;
          }  
          .fm1{
            display: none;
          } 
          .mySlides{
               width:100%;
               height:200px;
          }
          .image{
            width: 100%;
            margin-left:20px;
          } 
          a .my{
            width:115px;
            height: 140px;
            margin:2px;
            margin-top:10px;
            margin-left: 40px;
            margin-right: 5px; 
            
          } 
          .mname{
            /*display: none;*/
                width:115px;
                margin-left:40px;
                margin-top:-22px;
          }        
          }
          /*end phone responsive*/
          </style>
    </head>
    <body>
    	<div class="row">
    		<div class="col-12 header">
    			 <ul>
    			 	  <li class="col-2" style="background-color:#339933;"><a href="signup.php" style="font-size:20px;color: white;">MWORLD</a></li>
    			    <li class="col-1"><a href="movies.php<?php echo'?uid='.$uid ?>" >HOME</a></li>
    			    <li class="col-1"><a href="onlinesearch.php<?php echo'?uid='.$uid ?>" >MOVIES</a></li>
    			    <li class="col-1"><a>TV-SERIES</a></li>
    			    <li class="col-1"><a>SONGS</a></li>
    			 </ul>  
    		   <form class="fm1" method="POST" action="search.php<?php echo'?uid='.$uid ?>">
    		    	<div class="col-6 input-group">
    		    		<div class="len input-group">
    			          <input type="text" placeholder="Search.." name="searchname">
    			          <button type="submit"><i class="fa fa-search" ></i></button>
    		        </div>
              </div>
    		   </form>
           <form class="col-6 fm2" method="POST" action="search.php<?php echo'?uid='.$uid ?>">
             <input type="text" placeholder="Search.." name="searchname">
           </form>  
    		</div>
      </div>
      <div class="row">
    	    <div class="col-12 aside">
    	    	  <img class="mySlides" src="images/a.jpg"  alt="please wait">
    			    <img class="mySlides" src="images/b.jpg"  alt="plase wait">
    			    <img class="mySlides" src="images/c.jpg"  alt="please wait">
    			    <img class="mySlides" src="images/d.jpg"  alt="please wait">
    			    <img class="mySlides" src="images/e.jpg"  alt="please wait">
    	    </div>
      </div> 
      <div class="row">
          <div class=" col-12 section">
                <h3 class="nm">SONGS</h3><!-- <hr> -->
            <div class="col-10 image">
              <div class="col-12"><hr></div>
<!--                 <a href=""><img class="my" src="cover/a.jpg" style="width:120px;height:150px" alt="please wait"></a>
                <div class='mname'><p>qwerty qwert wert</p></div> -->
                <?php
                    // $a=142;
                    // $b=664;
                    // $i=0;
                    while($result=mysqli_fetch_assoc($data))
                    {  
                      // $i++;
                      // if($i==1)
                      // {  
                      //    $a=142;
                      // }
                      // else
                      // {
                      //    $a=$a+130;
                      // }
                      // if($i==9)
                      // {
                      //   $a=142;
                      //   $b=829;
                      // }
                      // if($i>9)
                      //{
                      //  $b=829;
                      //} 
                      $j=$result['thumbnail'];
                      $k=$result['title'];
                      // echo"<a href='moviereview.php?mid=$result[id]&uid=$_GET[uid]'><img class='my' src='cover/".$j.".jpg' style='' alt='plase wait'></a>";
                      // echo"<div class='mname' style='left:".$a."px;top:".$b."px;'>$k</div>";                      
                      
                      echo"<div class='hello' style='float:left;'><a href='moviereview.php?mid=$result[id]&uid=$_GET[uid]'><img class='my' src='cover/".$j.".jpg' style='' alt='plase wait'></a>";
                      echo"<div class='mname' style=''>$k</div></div>";
                    }
                ?>              
            </div>
          </div>
      </div><br> 
    	<script>
           var myIndex = 0;
           carousel();
           function carousel() 
           {
           var i;
           var x = document.getElementsByClassName("mySlides");
           for (i = 0; i < x.length; i++) 
           {
              x[i].style.display = "none";  
           }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 3000); // Change image every 3 seconds
           }
      </script>
    </body>
</html>