<?php 

//Title, 
//Director, 
//Writer, 
//Actors, 
//Plot, 
//Poster, 
//Runtime, 
//Rating, 
//Votes, - imdbVotes
//Genre, 
//Released, 
//Year, 
//Rated, - imdbRating
//IMDb ID - imdbID
//Type - params = movie,series,
/*

s (NEW!)	string (optional)	title of a movie to search for
i			string (optional)	a valid IMDb movie id
t			string (optional)	title of a movie to return
y			year (optional)		year of the movie
r			JSON, XML			response data type (JSON default)
plot		short, full			short or extended plot (short default)
callback	name (optional)		JSONP callback name
tomatoes	true (optional)		adds rotten tomatoes data
	
*/


class Movie { 
	var $s_title;
	var $o_released;
	var $s_plot;
	var $s_runtime;
	var $s_rated;
	var $s_poster_url;
	var $s_director;			 
	var $s_writer;
	var $s_genre;
	var $s_actors;
	var $f_imdb_rating;
	var $s_imdb_id;
} 

class Series {
	var $s_title;
	var $o_year;
	var $s_plot;
	var $s_poster_url;
	var $s_director;			 
	var $s_writer;
	var $s_actors;
	var $f_imdb_rating;
	var $s_genre;
	var $s_imdb_id;
}

class Episode {
	var $s_parent_series;
	var $s_runtime;
	var $i_season;
	var $i_episode;
	var $s_title;
	var $o_released;
	var $s_plot;
	var $s_poster_url;
	var $s_director;			 
	var $s_writer;
	var $s_actors;
	var $f_imdb_rating;
	var $s_imdb_id;
}


?>