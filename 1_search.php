<?php
$request_id = $id_request;
$search_title = $q[1];
$search_text = $q[2];
$category = $q[11];
// connetct api file
require_once ('c:\web\sphinx\api\sphinxapi.php');
if ($category == '0')
{
	echo "Для получения подсказки установите категорию обращения";
}
else
{
// searching word
$string = "$search_text$"; 
$options = array
(
        'before_match'          => '<b>',
        'after_match'           => '</b>',
        'chunk_separator'       => ' ... ',
        'limit'                 => 60,
        'around'                => 3,
);
$index = 'test1';

// set new SphinxClient
$sphinx = new SphinxClient();

// set connection with Sphinx-server
$sphinx -> SetServer('localhost', 9312);

// 

// searching on any word
$sphinx -> SetMatchMode(SPH_MATCH_ANY);

// sort by relevance
$sphinx -> SetSortMode(SPH_SORT_RELEVANCE);

// result of query
$result = $sphinx->Query($string,'*');

if ($result and isset($result['matches']))
{
	// get massive of keys
	echo  "<form method=\"get\" action=\"solution_from_help.php\">";
	$id_keys = array_keys($result['matches']);
	foreach ($id_keys as $massiv => $key)
	{
		$id = $key;
		
	//$id = implode(',',$id_keys);
	
	$query = "SELECT title, request.text, solution.text, solution.id
			FROM request,solution
			WHERE request.id ='$id'
			AND solution.request_id='$id'
			AND request.category='$category'
			ORDER BY solution.id";
	$resource = mysql_query($query) or die (mysql_error());
	
	while ($result_of_query = mysql_fetch_array($resource))
	{
		
		echo "Обращение: <div id=\"solution_title\">$result_of_query[0] <br>$result_of_query[1]</div>
		
		
		Решение: <div id='solution_text'>
		<input type='radio' name='solution_id' value=$result_of_query[3]>
		$result_of_query[2]
		
		</div>
				
		<br><br>
			
			";
	}
		
	}
	echo "
	
	<input type='hidden' name='request_id' value=$id_request>
	<input type='submit' value='Выбрать решение' name='add_solution'>
		</form>";
	
}
}
?>