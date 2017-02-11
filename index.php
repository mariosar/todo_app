<?php

require_once __DIR__ .'/config.php';

// Create Tasks
if($_POST['tasks'] == 'create'){
	$taskName = $_POST['newTask'];
	$taskId = null;
	try {
		$query = $db->prepare("INSERT INTO tasks (name) VALUES ('{$taskName}'	)");
		$query->execute();
		$taskId = $db->lastInsertId();	
	} catch (Exception $e) {
		var_dump($e);
	}
	if($_POST['ajax'] == "1"){
		$query = $db->prepare("SELECT * FROM tasks WHERE id={$taskId}");
		$query->execute();
		$task = $query->fetch(PDO::FETCH_OBJ);

		$returnObj = new stdClass();
		$returnObj->action = $_POST['tasks'];
		$returnObj->id = $taskId;

		ob_start();
		echo $blade->make('tasks/_task', ['task' => $task]);
		$returnObj->content = ob_get_clean();

		echo json_encode($returnObj);
	}
}

// Delete Tasks
if($_POST['tasks'] == 'delete'){
	$taskId = $_POST['taskId'];
	try {
		$query = $db->prepare("DELETE FROM tasks WHERE id={$taskId}");
		$query->execute();
	} catch (Exception $e) {
		var_dump($e);
	}
	if($_POST['ajax'] == "1"){
		$returnObj = new stdClass();
		$returnObj->action = $_POST['tasks'];
		$returnObj->id = $taskId;

		echo json_encode($returnObj);
	}
}

// Update Tasks
if($_POST['tasks'] == 'markComplete'){
	$taskId = $_POST['taskId'];
	$completed = ($_POST['completed']) ? "0" : "1";
	try {
		$query = $db->prepare("UPDATE tasks SET completed={$completed} WHERE id={$taskId}");
		$query->execute();
	} catch (Exception $e) {
		var_dump($e);
	}
	if($_POST['ajax'] == "1"){
		try {
			$query = $db->prepare("SELECT * FROM tasks WHERE id={$taskId}");
			$query->execute();
			$task = $query->fetch(PDO::FETCH_OBJ);
			$returnObj = new stdClass();
			$returnObj->action = $_POST['tasks'];
			$returnObj->id = $taskId;

			ob_start();
			echo $blade->make('tasks/_task', ['task' => $task]);
			$returnObj->content = ob_get_clean();
			
			echo json_encode($returnObj);
		} catch (Exception $e) {
			var_dump($e);
		}
	}
}

// Get all Tasks Index
if($_POST['ajax'] != "1"){
	try{
		$query = $db->prepare("SELECT * from tasks ORDER BY id desc");
		$query->execute();
		$tasks = $query->fetchAll(PDO::FETCH_OBJ);
	} catch (Exception $e) {
		var_dump($e);
	}

	echo $blade->make('tasks/index', ['tasks' => $tasks]);	
}
