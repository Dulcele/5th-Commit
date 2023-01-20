<?php 

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
       array_push($errors, 'Username is required');
    }
   
    if (empty($user['email'])) {
     array_push($errors, 'Email is required');
   }
   
   if (empty($user['password'])) {
     array_push($errors, 'Password is required');
   }

   if ($user['password'] !== $user['password']) {
    array_push($errors, 'The passwords are not the same');
  }

    //$existingUser = selectOne('user', ['email' => $user['email']]);
   // if ($existingUser) {
   //     array_push($errors, 'Email already exists. Try another email.');
   // }


   $existingUser = selectOne('user', ['email' => $user['email']]);
if ($existingUser) {
  if (isset($post['update-user']) && $existingUser['id'] != $user['id']) {
    array_push($errors, 'Email already exists.');
  }

  if (isset($post['create-admin'])) {
    array_push($errors, 'Email already exists.');
  }
    
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