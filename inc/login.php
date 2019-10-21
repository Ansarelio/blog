<?php

/* проверяем существует ли переменная $_POST['email']; */
/* она создается только при отправке данных с формы */
/* $_POST[] - это массив который создается при отправке формы */
/* 'email' мы получили из формы name="email" */
if(isset($_POST['email'])) {
	/* Вызываем функцию getPost() которую создали ниже */
	/* она обрабатывает полученные $_POST данные */
	/* то есть по сути мы просто получаем введенные пользователем значения */
	/* в данном случае емайл и пароль */
	$email = getPost('email');
	$password = getPost('password');

	/* используем объект $DBcon, который создали в файле connection.php */
	/* Через этот объект мы будем делать запросы в нашу базу данных */
	/* используем метод query() объекта $DBcon */
	/* в функцию query мы передаем строку: "SELECT * FROM user WHERE email = '$email'" это и есть наш запрос */
	/* мы использовали SELECT поэтому эта функция вернет нам объект */
	/* то есть после выполнения этой строки кода $query будет содержать в себе результат нашего запроса */
	$query = $DBcon->query("SELECT * FROM users WHERE email = '$email'"); 

	/* точно так же используем метод fetch_assoc() объекта $query */
	/* он возвращает массив с результатами нашего запроса */
	/* в данным случае он вернет либо массив с данными нашего SELECT либо ничего, если ничего не было найдено в таблице */
	$user = $query->fetch_assoc();

	/* Здесь мы проверяем переменную $user на пустоту */
	/* Она будет пустой в том случае если в таблице user не было найдено строк с email равным тому что было отправлено через пост */
	/* (SELECT * FROM user WHERE email = '$email') */
	if (empty($user)) {
		/* создаем переменную $message в которую будем записывать уведомление, которое хотим отобразить в браузере */
		$message = "email и / или пароль не подходят!";
		/* urlencode() кодирует строку в URL вид, например пробелы заменит на + */
		$message = urlencode($message);
		/* header() - функция отвечающая за отправку хэдеров в браузер */
		/* мы используем location, которая перенаправляет браузер на страницу которую мы указали. в данном случае info.php */
		header('location: info.php?type=alert-danger&message=' . $message);
	} else {
		/* создаем перменную $hash и даем значение полученное из массива $user */
		/* откуда взялось слово password? Это название поля в таблице user. */
		/* если бы мы в таблице указали название столбца не password, а hash, соответсвенно и написали бы $user['hash'] */
		$hash = $user['password'];

		/* функция password_verify() проверяет сходятся ли пароли */
		/* ей нужно передать два значения: введенный пароль, и хэш для сравнения */
		if (password_verify($password, $hash)) {
			/* создаем переменную $loggedIn для удобства, чтобы дальше проверять, залогинен ли пользователь */
			$loggedIn = TRUE;
			/* Создаем сессии. к массиву $_SESSION мы имеем доступ на любой странице. */
			$_SESSION['id'] = $user['id'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['email'] = $user['email'];
			$message = "Успешно залогинились в систему!";
			$message = urlencode($message);
			header('location: info.php?type=alert-success&message=' . $message);
		} else {
			$message = "email и / или пароль не подходят!";
			$message = urlencode($message);
			header('location: info.php?type=alert-info&message=' . $message);
		}
	}

}

/* проверяем на пустоту переменную $_SESSION */
/* она будет пустой если пользователь не залогинен */
/* потому что мы ее создаем только в том случае если емайл был найден в таблице user, введенный пароль совпал! */
if (!empty($_SESSION['id'])) {
	$loggedIn = TRUE;
	$id = $_SESSION['id'];
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
} else {
	$loggedIn = FALSE;
}

if (isset($_POST['logout'])) {
	$loggedIn = FALSE;
	destroy_session();
}


function getPost($post) {
	if (isset($_POST[$post]) && !empty($_POST[$post])) {
		$string = checkInputs($_POST[$post]);
		return $string;
	} else {
		return NULL;
	}
}

function checkInputs($string) {
	$string = stripslashes($string);
    $string = htmlspecialchars($string);
    $string = trim($string);
    return $string;
}

function destroy_session() {
    $_SESSION = array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time() - 2592000, '/');

    session_destroy();
}
?>
