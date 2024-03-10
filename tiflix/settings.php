<?php
error_reporting(0); 

//set your site url to point main application folder Eg. tiflix

//$site_url ='https://example.com/tiflix';

$site_url ='http://localhost/tiflix';



//Set Video Post Pagination rows calls for Ajax Load More Content
// Value of 3 means that 3 rows will be fetch from database each time Load More Video Post is clicked. 
//It must be number and not string as I set it below here

$rowpage_video_post = 10; 


//Set comments Pagination rows calls for Ajax Load More Content
// Value of 5 means that 5 rows will be fetch from database each time Load More Comment is clicked.
//It must be number and not string as I set it below here

$rowpage_video_post_comment = 10; 

?>
