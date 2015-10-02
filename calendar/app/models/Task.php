<?php
/**
 * Created by PhpStorm.
 * User: ivailokotov
 * Date: 8/14/15
 * Time: 5:22 PM
 */

class Task {

    public function insert($data)
    {
        DB::insert('insert into tasks (name, project_id, time_estimated) values (?, ?, ?)', array($_POST['name'], $_POST['project'], $_POST['estimate']));
        return $_POST['project'];
    }
}