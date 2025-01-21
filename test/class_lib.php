<?php
	class table {
		var $name;
		var $cols = array("id","user_id");
		
		function __construct($table_name) {
			$this->name = $table_name;	
		}
		
		function set_name($new_name) {
			$this->name = $new_name;
		}
		
		function get_name() {
			return $this->name;
		}
		
		function add_cols($new_col) {
			array_push($this->cols, $new_col);		
		}
		
		function dequeue_cols() {
			return array_shift($this->cols);		
		}
		
		function get_cols() {
			return $this->cols;		
		}
		
	}
?>
	