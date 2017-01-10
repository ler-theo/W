<?php

	$w_routes = array(
		//default
		['GET', '/', 'Default#home', 'default_home'],

		//Article
		['GET', '/Article/Written', 'Article#Written', 'article_written'],
		['GET', '/Article/Update', 'Article#Update', 'article_update'],
		['GET', '/Article/Voir', 'Article#Voir', 'article_voir'],

		//User
		['GET', '/User/Signin', 'User#Signin', 'user_signin'],
		['GET', '/User/Login', 'User#Login', 'user_login'],
		['GET', '/User/Update', 'User#Update', 'user_update']
	);
