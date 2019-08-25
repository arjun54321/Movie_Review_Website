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
    <title>Browse your Faourite Movies</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid body">
    	<div class="container">
            <div class="sbox">
                <div>
                    <a  class="searchBox" href="movies.php<?php echo'?uid='.$uid ?>" style="background:#339933;">Go Back To Home</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="sbox">
                <div>
                    <form id="searchForm">
                        <input type="text" class="searchBox" placeholder="Search Movies here" id="searchText">
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="movies" class="row"></div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    	//TAKE MOVIENAME FROM THE USER.........................
    	$(document).ready(() => {
			    $('#searchForm').on('input', (e) => {
			        let searchText = $('#searchText').val();
			        if (searchText == null) {
			            console.log(true);
			        }
			        getMovies(searchText);
			        e.preventDefault();
			    })
			})

    	//AUTO SHOW FIRST PAGE MOVIES......................
    	$(document).ready(() => {
                axios.get('https://api.themoviedb.org/3/movie/popular?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=2')
                .then((response) => {
                console.log(response);
	            let movies = response.data.results;
	            let output = '';
	            $.each(movies, (index, movie) => {
	                if (movie.poster_path === null) {
	                    poster = "images/default-movie.png";
	                } else {
	                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
	                }
	                let date = movie.release_date;
	                let year = date.slice(0, 4);
	                output += `
	                    <div class="col-md-3 box">
	                      <div class="movieBox">
	                        <img src="${poster}" alt="poster" width="210" height="315" class="img">
	                        <div class="browse-movie-bottom">
	                            <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
	                            <div class="browse-movie-year">${year}</div>
	                            <button type="submit" class="button" onclick="movieSelected('${movie.id}')">Movie Details</button>
	                        </div>
	                        </div>
	                    </div>
	            `
	            });
	            $('#movies').html(output);
	        })
	        .catch((error) => {
	            console.log(error);
	        });
	    })

    	//SHOW THE SEARCHED MOVIES...................
	    function getMovies(searchText) {
		    axios.get('https://api.themoviedb.org/3/search/movie?api_key=5ec279387e9aa9488ef4d00b22acc451&query=' + searchText)
		        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
		        .then((response) => {
		            console.log(response);
		            let movies = response.data.results;
		            let output = '';
		            let output1 = '';
		            $.each(movies, (index, movie) => {
		                if (movie.poster_path === null) {
		                    poster = "images/default-movie.png";
		                } else {
		                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
		                }
		                let date = movie.release_date;
		                let year = date.slice(0, 4);
		                output += `
		                        <div class="col-md-3 box">
		                          <div class="movieBox">
		                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
		                            <div class="browse-movie-bottom">
		                                <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
		                                <div class="browse-movie-year">${year}</div>
		                                <button type="submit" class="button" onclick="movieSelected('${movie.id}')">Movie Details</button>
		                            </div>
		                            </div>
		                        </div>
		                `
		            });
		            $('#movies').html(output);
		        })
		        .catch((error) => {
		            console.log(error);
		        });
		}

		//GIVES PATH TO THE NEXT PAGE...............
		function movieSelected(id) {
		    sessionStorage.setItem('id', id);
		    window.location = 'onlinereview.php<?php echo'?uid='.$uid ?>';
		    return false;
		}
    </script>
</body>
</html>