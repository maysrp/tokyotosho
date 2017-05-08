Tokyotosho
## Usage

/class/tokyo.php 

### Mysql info
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
curl */1 * * * * http://yourdomain/index.php

```





