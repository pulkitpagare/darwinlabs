# Darwin Labs demo




### Installation for linux environment

Online Demo (http://52.55.169.34/) .

Clone the repository.

```sh
$ git clone https://github.com/pulkitpagare/darwinlabs.git
$ cd darwinlabs
```
Move it to the server location. Change the config url
```sh
$config['base_url'] = 'http://localhost/[whatever you server location name]';
```
run [darwinlabs.sql](https://raw.githubusercontent.com/pulkitpagare/darwinlabs/master/darwinlabs.sql)
```sh
$ mysql -u [username] -p[password] [database name] < darwinlabs.sql
```

update the database config file

```sh
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => '[your username]',
	'password' => '[your password]',
	'database' => 'darwinlabs',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
