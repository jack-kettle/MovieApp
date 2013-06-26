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

class Search_Result {
	private $s_id = "";
	private $s_type = "";
	private $s_year = "";
	private $s_title = "";
	
	function fn_get_id(){ return $this->s_id; }
	function fn_get_type(){ return $this->s_type; }
	function fn_get_year(){ return $this->s_year; }
	function fn_get_title(){ return $this->s_title; }
	
	function __construct($s_title = "", $s_year = "", $s_id = "", $s_type = ""){
		$this->s_title = (String)$s_title;
		$this->s_year = (String)$s_year;
		$this->s_id = (String)$s_id;
		$this->s_type = (String)$s_type;
	}
}

?>