<?php
//full system search function
function searchDB($db_name, $search_values)
{
	$table_fields = array();
	$cumulative_results = array();

	$result = $this->db->query("
		SELECT TABLE_NAME, COLUMN_NAME, DATA_TYPE
		FROM  `INFORMATION_SCHEMA`.`COLUMNS` 
		WHERE  `TABLE_SCHEMA` =  '{$db_name}'
		AND `DATA_TYPE` IN ('varchar', 'char', 'text')
		")->result_array();
	
	foreach ( $result  as $o ) 
	{
		$table_fields[$o['TABLE_NAME']][] = $o['COLUMN_NAME'];			
	}
	
	foreach($table_fields as $table_name => $fields)
	{
		$search_array = array();
		
		foreach($fields as $field)
		{
			foreach($search_values as $value) 
			{
				$search_array[] = " `{$field}` LIKE '{$value}' ";
			}
		}
		$search_string = implode (' OR ', $search_array);
		$query_string = "SELECT * FROM `{$table_name}` WHERE {$search_string}";
		
		$table_results = $this->db->query($query_string)->result_array();		
		$cumulative_results = array_merge($cumulative_results, $table_results);
	}
	
	return $cumulative_results;
}
?>