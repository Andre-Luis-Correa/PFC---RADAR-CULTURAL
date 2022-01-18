<?php

function validateUser($user)
{

	$errors = array();

   if (empty($user['nome_completo']))
   {
   		array_push($errors, 'Nome completo obrigatório');
   }

   if (empty($user['nome_usuario']))
   {
   		array_push($errors, 'Nome de usuário obrigatório');
   }

   if (empty($user['email']))
   {
   		array_push($errors, 'Email obrigatório');
   }

   if (empty($user['senha']))
   {
   		array_push($errors, 'Senha obrigatória');
   }

   if ($user['senhaConf'] !== $user['senha'])
   {
   		array_push($errors, 'Senhas não se combinam');
   }

   $existingUser = selectOne('tb_usuario', ['email' => $user['email']]);
   if ($existingUser) {
      array_push($errors, 'Email já existente');
   }

   return $errors;
}


function validateLogin($user)
{

   $errors = array();

   if (empty($user['nome_usuario']))
   {
         array_push($errors, 'Nome de usuário obrigatório');
   }


   if (empty($user['senha']))
   {
         array_push($errors, 'Senha obrigatória');
   }

   return $errors;
}