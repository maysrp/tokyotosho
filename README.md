Tokyotosho
## Usage

Linux PHP>5.3 mysql 

### Mysql

/class/tokyo.php 
```
public function __construct(){
			$this->tokyo = new medoo([
    				'database_type' => 'mysql',
 				'database_name' => 'tokyo',
 				'server' => 'localhost',
 			        'username' => 'root',
  				'password' => '',
			        'charset' => 'utf8',
   			        'port' => 3306,
    				'prefix' => 'info_',
			]);
		}
```

import sql file

tokyo.sql

### crontab 

```
crontab -e

```

```
curl */1 * * * * http://yourdomain/collection.php

```

### Thanks for

[PHPQuery](https://github.com/TobiaszCudnik/phpquery)

[Medoo](https://github.com/catfan/Medoo) 



