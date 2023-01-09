<?php 

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
       array_push($errors, 'Username is requierd');
    }
   
    if (empty($user['email'])) {
     array_push($errors, 'Email is requierd');
   }
   
   if (empty($user['password'])) {
     array_push($errors, 'Password is requierd');
   }

   if ($user['password'] !== $user['password']) {
    array_push($errors, 'The passwords are not the same');
  }
    $existingUser = selectOne('user', ['email' => $user['email']]);
    if (isset($existingUser)) {
        array_push($errors, 'Email already exists. Try another email.');
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
       array_push($errors, 'Username is requierd');
    }

   if (empty($user['password'])) {
     array_push($errors, 'Password is requierd');
   }

    return $errors;
}