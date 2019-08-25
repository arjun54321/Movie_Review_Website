<?php
    include("connection.php");
    error_reporting(1);
    $uid=$_GET['uid'];
    // $userid = substr($uid, -2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Information</title>
    <link rel="stylesheet" href="css/movie.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="display()">
    <div class="container">
        <div id="movie"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    <script>
        $(document).ready(function() {
            let movieId = sessionStorage.getItem('id');
            //test id -> 299536
            axios.get(`https://api.themoviedb.org/3/movie/${movieId}?api_key=5ec279387e9aa9488ef4d00b22acc451`)
                .then((response) => {
                    // https://api.themoviedb.org/3/movie/299536/reviews?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=1
                    console.log(response);
                    let movie = response.data;
                    if (movie.poster_path === null) {
                        poster = "../image/default-movie.png";
                    } else {
                        poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
                    }
                    let date = movie.release_date;
                    let year = date.slice(0, 4);
                    let Rated;
                    let revenue = movie.revenue / 1000000;
                    let budget = movie.budget / 1000000;
                    revenue = Math.round(revenue);
                    budget = Math.round(budget);
                    if (revenue === 0) {
                        revenue = "Revenue is less than million dollers"
                    }
                    if (budget === 0) {
                        budget = "Budget is less than million dollers"
                    }
                    let genre = [];
                    movie.genres.forEach(element => {
                        genre.push(element.name);
                    });
                    genres = genre.join(' / ');
                    var title=`${movie.title}`;
                    console.log(title);
                    let output1 = `<form method="POST" id="demo">
                    <input type="hidden" id="movie-title" name="movie-title" value="${movieId}">
                    <div class="row">
                        <div class="col-md-4 box1">
                            <img src="${poster}" class="poster-image">
                        </div>
                        <div class="col-md-4 box2">
                            <h1 class="movie-title" id="movie-title" name="movie-title" value="${movie.title}">${movie.title}</h1>
                            <h5 style="color: white; font-weight:bold">${year}</h5>
                            <h5 style="color: white; font-weight:bold; margin-top: -5px;">${genres}</h5>
                            <ul class="list-group">
                                <li class="list-group-item active">
                                    <strong>Rating: </strong><tr><td>
                                                              <input type="radio" name="rating1" value="5"> 5
                                                              <input type="radio" name="rating1" value="4"> 4
                                                              <input type="radio" name="rating1" value="3"> 3
                                                              <input type="radio" name="rating1" value="2"> 2
                                                              <input type="radio" name="rating1" value="1"> 1
                                                            </td></tr></li>
                                <li class="list-group-item active"> 
                                       <input type="text" name="coment" id="coment" placeholder="comments..." style="width:75%;float: left;">
                                       <input type="submit" name="submit" value="submit" style="width:25%">
                                </li>
                                <li class="list-group-item active">
                                    <strong>Status: </strong> ${movie.status}</li>
                                <li class="list-group-item active">
                                    <strong>Duration: </strong> ${movie.runtime} min</li>
                                <li class="list-group-item active">
                                    <strong>Revenue: </strong> $ ${revenue} million</li>
                            </ul>
                        </div>
                        <div class="col-md-4 box3">
                            <h1 class="title-second">Synopsis</h1>
                            <p>${movie.overview}</p>
                            <hr style="width: 80%;color: #222;">
                            <div>
                                <a href="http://imdb.com/title/${movie.imdb_id}" target="_blank" class="btn-one" style="background:#339933;border-radius:0%;">View IMDB</a>
                                <!-- <a href="http://imdb.com/title/${movie.imdb_id}" target="_blank" class="btn-info">View IMDB</a> -->
                                <a href="onlinesearch.php<?php echo'?uid='.$uid ?>" class="btn-second" style="border-radius:0%;">Go Back To Search</a><br><br>
                                 <input type="text" name="search" class="search" placeholder="enter user id..." style="width:75%;color:black;float: left;">
                                 <input type="submit" name="submit1" value="search" style="width:20%;color:black;float: left;">
                                 <?php
                 $search=$_POST['search'];
                 // echo $search;
                 $title=$_POST['movie-title'];
                    if($_POST['submit1'])
                     {
                          echo"<table style='color:white;text-align:center;background-color:#333;'>                         
                                     <tr>
                                        <th style='border:1px solid black;padding-right:23px;padding-left:23px;'>username</th>
                                        <th style='border:1px solid black;padding-right:23px;padding-left:23px;'>comments</th>
                                        <th style='border:1px solid black;padding-right:24px;padding-left:24px;'>rating</th><tr>
                                     </tr><br>
                                     </tr><br>";
                        //$search=$_POST['search'];
                        if($search!="")
                          {
                              $sql = "SELECT * FROM REVIEW WHERE id='$search' AND moviename='$title'";
                              //echo $sql;
                              $data= mysqli_query($con,$sql);
                              while($result=mysqli_fetch_assoc($data))
                              {
                                echo"<tr>
                                        <td style='border:1px solid black'>".$result['username']."</td>
                                        <td style='border:1px solid black'>".$result['comments']."</td>
                                        <td style='border:1px solid black'>".$result['rating']."</td>
                                     </tr>"."<br>";
                              }
                              echo "</table>";
                          }
                     }
                     echo"<br><br>
                                    <tr>
                                      <td>
                                        <input type='hidden' name='searchuser' value='$search'>
                                        <input type='submit' name='follow' value='follow' style='width:48%;color:black;float: left;'>
                                        <input type='submit' name='unfollow' value='unfollow' style='width:48%;color:black;float: left;'>                                      
                                      </td>
                                    </tr>";
                        $follow=$_POST['follow'];
                     if($follow)
                                    {
                                        $search=$_POST['searchuser'];
                                        if($search!='')
                                        {
                                          $query= "SELECT * FROM follow WHERE user='$uid' AND following='$search'";
                                          $data = mysqli_query($con,$query);
                                          $count=mysqli_num_rows($data);
                                          if($count>0)
                                          {
                                              // echo"<script>alert('alredy following')</script>";
                                          }
                                          else
                                          {
                                            $query="INSERT INTO FOLLOW(user,following) VALUES('$uid','$search')";
                                            $data=mysqli_query($con,$query);
                                            if($data)
                                            {
                                                 // echo"<script>alert('user followed')</script>";
                                            }
                                            else
                                            {
                                                // echo"not inserted";
                                            }
                                          }
                                        }
                                    }
                     if($_POST['unfollow'])
                                    {
                                        $search=$_POST['searchuser'];
                                        if($search!='')
                                        {
                                        $query="DELETE FROM FOLLOW WHERE user='$uid' AND following='$search'";
                                        $data=mysqli_query($con,$query);
                                        if($data)
                                            {
                                                 // echo"<script>alert('user unfollowed')</script>";
                                            }
                                        }
                                    }                   
                 ?>
                            <div id="display"></div><br>
                            <button onClick="display()" style="width:96%;background:#339933;border-style:none;color:white;">Followed User Comment</button>
                            <div id="userlist">
                                 <h3>User<span style="color:green;">_</span>List</h3>
                                 <div id="userslist"></div>
                            </div>
                        </div>
                    </div></form>
                    `
                    $('#movie').html(output1);
                })
                .catch((error) => {
                    console.log(error);
                });
            })
    
    </script>
    <?php
                     if($_POST['submit'])
                     {    
                          // echo "<script>console.log('hello')</script>";
                          $cm=$_POST['coment'];
                          $rt=$_POST['rating1']; 
                          $title=$_POST['movie-title'];           
                          if($cm!=""||$rt!="")
                          { 
                              $sql = "SELECT * FROM USERS WHERE id='$uid'";
                              $data= mysqli_query($con,$sql) ;
                              $result=mysqli_fetch_assoc($data);
                              $name=$result['username'];
                              $uuid=$result['id'];
                              $sql1 = "SELECT * FROM REVIEW WHERE id='$uuid' AND moviename='$title'";
                              $data1= mysqli_query($con,$sql1) ;
                              $count1=mysqli_num_rows($data1);
                              if($count1>0)
                              {
                                  $query="UPDATE REVIEW SET comments='$cm',rating='$rt' WHERE id='$uuid' AND moviename='$title'";
                                  $data=mysqli_query($con,$query);
                                  if($data)
                                  {
                                    // echo"data updated successfully";
                                  }
                                  else
                                  {
                                    // echo"not updated";
                                  }
                              }
                              else
                              {
                                $query="INSERT INTO REVIEW(MOVIENAME,USERNAME,COMMENTS,RATING,ID) VALUES('$title','$name','$cm','$rt','$uuid')";
                                $data=mysqli_query($con,$query);
                                if($data)
                                {
                                  // echo"data inserted successfully";
                                }
                                else
                                {
                                  // echo"not inserted";
                                }
                              }
                          }
                          else
                          {
                            // echo"<script>alert('there are no coments')</script>";
                          }
                     }
                 ?>
                 <script>
                     function display()
         {
            // let movieId = sessionStorage.getItem('id');
            // console.log(movieId);
            document.getElementById("display").innerHTML = '<table style="color:white;text-align:center;background-color:#333;"> <tr> <th style="border:1px solid black;padding-right:23px;padding-left:23px;">username</th> <th style="border:1px solid black;padding-right:23px;padding-left:23px;">comments</th> <th style="border:1px solid black;padding-right:24px;padding-left:25px;">rating</th> </tr><br><?php  $userid=$_GET['uid'];
                  // echo"<span >$uid</span>";
                  $title=$_POST['movie-title'];
                  // echo"<span >$title</span>";
                  $sql='SELECT * FROM follow WHERE user='.$userid.'';
                  $data = mysqli_query($con,$sql);
                  while($result=mysqli_fetch_assoc($data))
                  {
                  $following[]=$result['following'];
                  $n++;
                  } 
                  for($i = 0; $i <= $n; $i++)
                  {
                      $sql1='SELECT * FROM review WHERE id='.$following[$i].' AND moviename='.$title.'';
                      $data1 = mysqli_query($con,$sql1);
                      while($result=mysqli_fetch_assoc($data1))
                      {
                          echo '<tr><td style="border:1px solid black">'.$result['username'].'</td><td style="border:1px solid black">'.$result['comments'].'</td><td style="border:1px solid black">'.$result['rating'].'</td></tr><br>';
                      }
                  }
                  ?></table>';
          document.getElementById("userslist").innerHTML = '<?php  
                  $sql='SELECT * FROM users';
                  $data = mysqli_query($con,$sql);
                  while($result=mysqli_fetch_assoc($data))
                  {                 
                          echo '<tr><td>'.$result['id'].'</td></tr><br>';
                  }
                  ?>';
         }
                 </script>
</body>
</html>
