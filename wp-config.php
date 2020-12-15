<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'jewelry' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'fvziKOmBH4eC3Z*DSF7/~qi1RX1=6hJ4XS#EKtW;/f}Qi7^~A?nlA|HPp23[4(z-' );
define( 'SECURE_AUTH_KEY',  '0&]>I))k`k6{=bl6B:3~FKOlRXpd2xd3y[D&]S6WJNF5&(f]vZLK>Vi? p<B,T;S' );
define( 'LOGGED_IN_KEY',    '?oS[/e{Xdy~NRrg?SDx!C.JjFe1UJD$rlN>=n*-^a{L*.J5V`18J}DTK)QIF@/mc' );
define( 'NONCE_KEY',        'H*H?}XiAY|%}vQ,p&fCn#iLza4BEy<y&)@2C!9mfLTU3e]-L- }EvWV{<DuC/?o<' );
define( 'AUTH_SALT',        ',;uUOP(FM6a=<rf>.5=r0nS3z3SqK9-D9n%@uT$fSm O8hkeF|i`XI=b5u,]tNA]' );
define( 'SECURE_AUTH_SALT', '__ % 9Aq=$rAK|R:lTG}/VE#6h}%0rBzAmgBsSaZxvGmB<z^i (P0yS_NAcKJ6@J' );
define( 'LOGGED_IN_SALT',   'zLH:V+^S<ug|Ia^|1AJwEZK7eO128u!bGwduJlqL&PX-qIX5_B[[BGZdTR;O;/vc' );
define( 'NONCE_SALT',       '|yyfn({@PE*j%x0PZ[F>]{d3]jNIc@Q0C:p$S=+iP[W@}6- X}|e!O%r%{(t>e3O' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_1';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
