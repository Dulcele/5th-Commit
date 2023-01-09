<?php 

function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
       array_push($errors, 'Name is requierd');
    }

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if (isset($existingTopic)) {
        array_push($errors, 'Name already exists. Try another email.');
    }

    return $errors;
}