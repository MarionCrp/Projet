<?php

var_dump($user = new User(array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'password' => $password,
				'gender' => $_POST['gender'],
				'description' => $_POST['description'],
				'nationalityId' => $_POST['nationality'],
				'cityId' => $_POST['city']
			)));