# Ifood
[![Latest Stable Version](https://poser.pugx.org/matheushack/ifood/v/stable)](https://packagist.org/packages/matheushack/ifood)
[![Latest Unstable Version](https://poser.pugx.org/matheushack/ifood/v/unstable)](https://packagist.org/packages/matheushack/ifood)
[![Total Downloads](https://poser.pugx.org/matheushack/ifood/downloads)](https://packagist.org/packages/matheushack/ifood)
[![License](https://poser.pugx.org/matheushack/ifood/license)](https://packagist.org/packages/matheushack/ifood)
 
Projeto para integração com o sistema do Ifood.

## Instalação
### Composer
```
"matheushack/ifood": "dev-master"
```
## Métodos
### Criar categoria
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\Categories;
use MatheusHack\IFood\Constants\Availability;

$categories = new Categories();
$categories->create([
    'externalCode' => 'CAT001',
    'name' => 'Lanches',
    'order' => 1,
    'status' => Availability::ACTIVE
]);
```
### Criar grupo de complemento
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\GroupComplements;

$groupComplement = new GroupComplements();
$groupComplement->create([
    'externalCode' => 'GRP001',
    'name' => 'Bebida',
    'sequence' => 1,
    'minQuantity' => 1,
    'maxQuantity' => 1
]);
```

### Criar item principal
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\Items;
use MatheusHack\IFood\Constants\DaysOfWeek;
use MatheusHack\IFood\Constants\Availability;

$items = new Items();
$items->create([
	'externalCode' => 'ITP001',
	'name' => 'Hack X-burguer',
	'order' => 1,
	'status' => Availability::ACTIVE,
	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
	'price' => [
		'amount' => 1,
		'isPromotional' => false
	],
	'schedules' => [DaysOfWeek::MON, DaysOfWeek::TUE, DaysOfWeek::WED, DaysOfWeek::THU, DaysOfWeek::FRI]
]);
```

### Criar subitem(complemento)
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\Items;
use MatheusHack\IFood\Constants\Availability;

$items = new Items();
$items->create([
	'externalCode' => 'ITS001',
	'name' => 'Coca-cola',
	'order' => 1,
	'status' => Availability::ACTIVE,
	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
	'price' => [
		'amount' => 2,
		'isPromotional' => false
	],
	'schedules' => []
]);
```

### Linkar subitem(complemento) no grupo de complementos
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\Items;

$items = new Items();
$items->joinGroup([
	'externalCodeGroup' => 'GRP001',
	'externalCodeItem' => 'ITS001',
	'sequence' => 1
]);
```

### Linkar grupo de complementos ao item principal
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\GroupComplements;

$groupComplement = new GroupComplements();
$groupComplement->joinItem([
	'externalCodeGroup' => 'GRP001',
	'externalCodeItem' => 'ITP001',
	'maxQuantity' => 1,
	'minQuantity' => 1,
	'order' => 1
]);
```

### Linkar item principal a categoria
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\Items;

$items = new Items();
$items->joinCategory([
	'externalCode' => 'ITP001',
	'externalCodeCategory' => 'CAT001',
	'order' => 1
]);
```

### Restaurante disponível
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\Restaurant;

$restaurant = new Restaurant();
$restaurant->available();
```

### Restaurante indisponível
```php
<?php
require_once('vendor/autoload.php');

use MatheusHack\IFood\Restaurant;

$restaurant = new Restaurant();
$restaurant->unavailable('MOTIVO');
```