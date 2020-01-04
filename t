[1mdiff --git a/example/index.php b/example/index.php[m
[1mindex 8ac7eb0..854a105 100644[m
[1m--- a/example/index.php[m
[1m+++ b/example/index.php[m
[36m@@ -9,7 +9,9 @@[m [mrequire '../vendor/autoload.php';[m
 [m
 use MatheusHack\IFood\Restaurant;[m
 use MatheusHack\IFood\Categories;[m
[32m+[m[32muse MatheusHack\IFood\Items;[m
 use MatheusHack\IFood\Constants\Availability;[m
[32m+[m[32muse MatheusHack\IFood\Constants\DaysOfWeek;[m
 [m
 switch ($_GET['a'])[m
 {[m
[36m@@ -34,12 +36,28 @@[m [mswitch ($_GET['a'])[m
 			'externalCode' => 123456,[m
 			'description' => 'Teste de update categoria'[m
 		]));[m
[31m-		*/[m
[31m-[m
 		dd($categories->delete([[m
 			'externalCode' => 123456,[m
 			'name' => 'Matheus Teste'[m
 		]));[m
[31m-		dd($categories->all());[m
[32m+[m		[32m*/[m
[32m+[m		[32mdd($categories->items('e9a49ae5-20c9-468b-a178-c6032c36c28a'));[m
[32m+[m		[32mbreak;[m
[32m+[m	[32mcase 'item':[m
[32m+[m		[32m$item = new Items();[m
[32m+[m		[32mdd($item->complements('4f4a0621-504b-4617-8765-90a727b33628'));[m
[32m+[m		[32mdd($item->create([[m
[32m+[m			[32m'externalCode' => 'ITE1',[m
[32m+[m			[32m'name' => 'Matheus (ITE1)',[m
[32m+[m			[32m'order' => 1,[m
[32m+[m			[32m'status' => Availability::ACTIVE,[m
[32m+[m			[32m'description' => 'Item de teste para integração IFood',[m
[32m+[m			[32m'price' => [[m
[32m+[m				[32m'amount' => 0.5,[m
[32m+[m				[32m'isPromotional' => true,[m
[32m+[m				[32m'originalAmount' => 1[m
[32m+[m			[32m],[m
[32m+[m			[32m'schedules' => [][m
[32m+[m		[32m]));[m
 		break;[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/src/IFood/Categories.php b/src/IFood/Categories.php[m
[1mindex 44dd93e..0981050 100644[m
[1m--- a/src/IFood/Categories.php[m
[1m+++ b/src/IFood/Categories.php[m
[36m@@ -43,6 +43,21 @@[m [mclass Categories[m
 		return $this->service->all();[m
 	}[m
 [m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param string $categoryId[m
[32m+[m	[32m * @return Response[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function items($categoryId = '')[m
[32m+[m	[32m{[m
[32m+[m		[32m$validator = new Validator(['categoryId' => $categoryId]);[m
[32m+[m		[32m$validator->rule('required', ['categoryId']);[m
[32m+[m
[32m+[m		[32mif(!$validator->validate())[m
[32m+[m			[32mreturn (new ValidateResponse)->error($validator);[m
[32m+[m
[32m+[m		[32mreturn $this->service->items($categoryId);[m
[32m+[m	[32m}[m
[32m+[m
 	/**[m
 	 * @param array $data[m
 	 * @return Response[m
[1mdiff --git a/src/IFood/Factories/FactoryCategory.php b/src/IFood/Factories/FactoryCategory.php[m
[1mindex b333bf6..604ba7c 100644[m
[1m--- a/src/IFood/Factories/FactoryCategory.php[m
[1m+++ b/src/IFood/Factories/FactoryCategory.php[m
[36m@@ -16,7 +16,7 @@[m [muse MatheusHack\IFood\Requests\RequestCategory;[m
  * Class FactoryCategory[m
  * @package MatheusHack\IFood\Factories[m
  */[m
[31m-class FactoryCategory implements FactoryInterface[m
[32m+[m[32mclass FactoryCategory[m
 {[m
 	/**[m
 	 * @param array $data[m
[1mdiff --git a/src/IFood/Http/Authentication.php b/src/IFood/Http/Authentication.php[m
[1mindex 7d3c64f..3dfb0b2 100644[m
[1m--- a/src/IFood/Http/Authentication.php[m
[1m+++ b/src/IFood/Http/Authentication.php[m
[36m@@ -83,7 +83,7 @@[m [mclass Authentication[m
 [m
 			if(empty($iFoodResponse))[m
 				return (new Response)[m
[31m-					->setMessage('Information was successfully entered')[m
[32m+[m					[32m->setMessage('Not found')[m
 					->setSuccess(true);[m
 [m
 			return (new Response)[m
[1mdiff --git a/src/IFood/Http/IFood.php b/src/IFood/Http/IFood.php[m
[1mindex 214f1b6..0cef2b3 100644[m
[1m--- a/src/IFood/Http/IFood.php[m
[1m+++ b/src/IFood/Http/IFood.php[m
[36m@@ -48,4 +48,19 @@[m [mclass IFood extends Authentication[m
 	{[m
 		return $this->execute(sprintf('%s/categories', getenv('IFOOD_VERSION')), 'PUT', $category);[m
 	}[m
[32m+[m
[32m+[m	[32mpublic function itemsByCategory($categoryId)[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->execute(sprintf('%s/merchants/%s/menus/categories/%s', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID'), $categoryId), 'GET');[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32mpublic function createItem($item)[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->execute(sprintf('%s/skus', getenv('IFOOD_VERSION')), 'POST', $item);[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32mpublic function complementsByItem($itemId)[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->execute(sprintf('%s/merchants/%s/skus/%s/option_groups', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID'), $itemId), 'GET');[m
[32m+[m	[32m}[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/src/IFood/Items.php b/src/IFood/Items.php[m
[1mindex 87d4c09..6bab197 100644[m
[1m--- a/src/IFood/Items.php[m
[1m+++ b/src/IFood/Items.php[m
[36m@@ -9,7 +9,42 @@[m
 namespace MatheusHack\IFood;[m
 [m
 [m
[32m+[m[32muse MatheusHack\IFood\Constants\Availability;[m
[32m+[m[32muse MatheusHack\IFood\Entities\ValidateResponse;[m
[32m+[m[32muse MatheusHack\IFood\Services\ServiceItem;[m
[32m+[m[32muse Valitron\Validator;[m
[32m+[m
 class Items[m
 {[m
[32m+[m	[32mprivate $service;[m
[32m+[m
[32m+[m	[32mfunction __construct()[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->service = new ServiceItem();[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32mpublic function complements($itemId = '')[m
[32m+[m	[32m{[m
[32m+[m		[32m$validator = new Validator(['itemId' => $itemId]);[m
[32m+[m		[32m$validator->rule('required', ['itemId']);[m
[32m+[m
[32m+[m		[32mif(!$validator->validate())[m
[32m+[m			[32mreturn (new ValidateResponse)->error($validator);[m
[32m+[m
[32m+[m		[32mreturn $this->service->complements($itemId);[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m
[32m+[m	[32mpublic function create($data = [])[m
[32m+[m	[32m{[m
[32m+[m		[32m$validator = new Validator($data);[m
[32m+[m		[32m$validator->rule('required', ['externalCode','name', 'order', 'status', 'description']);[m
[32m+[m		[32m$validator->rule('integer', ['order']);[m
[32m+[m		[32m$validator->rule('in', 'status', [Availability::ACTIVE, Availability::INACTIVE]);[m
[32m+[m
[32m+[m		[32mif(!$validator->validate())[m
[32m+[m			[32mreturn (new ValidateResponse)->error($validator);[m
 [m
[32m+[m		[32mreturn $this->service->store($data);[m
[32m+[m	[32m}[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/src/IFood/Requests/RequestItem.php b/src/IFood/Requests/RequestItem.php[m
[1mindex f4eecc2..7f5d6d8 100644[m
[1m--- a/src/IFood/Requests/RequestItem.php[m
[1m+++ b/src/IFood/Requests/RequestItem.php[m
[36m@@ -9,6 +9,197 @@[m
 namespace MatheusHack\IFood\Requests;[m
 [m
 [m
[32m+[m[32muse MatheusHack\IFood\Traits\ConvertTrait;[m
[32m+[m
[32m+[m[32m/**[m
[32m+[m[32m * Class RequestItem[m
[32m+[m[32m * @package MatheusHack\IFood\Requests[m
[32m+[m[32m */[m
 class RequestItem[m
 {[m
[32m+[m	[32muse ConvertTrait;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $merchantId;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $availability;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $externalCode;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $name;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $description;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $order;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $price;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @var[m
[32m+[m	[32m */[m
[32m+[m	[32mprivate $schedules;[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getMerchantId()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->merchantId;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $merchantId[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setMerchantId($merchantId)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->merchantId = $merchantId;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getAvailability()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->availability;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $availability[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setAvailability($availability)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->availability = $availability;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getExternalCode()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->externalCode;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $externalCode[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setExternalCode($externalCode)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->externalCode = $externalCode;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getName()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->name;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $name[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setName($name)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->name = $name;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getDescription()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->description;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $description[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setDescription($description)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->description = $description;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getOrder()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->order;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $order[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setOrder($order)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->order = $order;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getPrice()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->price;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $price[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setPrice($price)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->price = $price;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @return mixed[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function getSchedules()[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->schedules;[m
[32m+[m	[32m}[m
[32m+[m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param mixed $schedules[m
[32m+[m	[32m * @return RequestItem[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function setSchedules($schedules)[m
[32m+[m	[32m{[m
[32m+[m		[32m$this->schedules = $schedules;[m
[32m+[m		[32mreturn $this;[m
[32m+[m	[32m}[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/src/IFood/Services/ServiceCategory.php b/src/IFood/Services/ServiceCategory.php[m
[1mindex d0b5726..f9ed200 100644[m
[1m--- a/src/IFood/Services/ServiceCategory.php[m
[1m+++ b/src/IFood/Services/ServiceCategory.php[m
[36m@@ -38,6 +38,15 @@[m [mclass ServiceCategory[m
 		return $this->iFood->allCategory();[m
 	}[m
 [m
[32m+[m	[32m/**[m
[32m+[m	[32m * @param $categoryId[m
[32m+[m	[32m * @return \MatheusHack\IFood\Entities\Response[m
[32m+[m	[32m */[m
[32m+[m	[32mpublic function items($categoryId)[m
[32m+[m	[32m{[m
[32m+[m		[32mreturn $this->iFood->itemsByCategory($categoryId);[m
[32m+[m	[32m}[m
[32m+[m
 	/**[m
 	 * @param array $data[m
 	 * @return \MatheusHack\IFood\Entities\Response[m
[1mdiff --git a/src/IFood/Traits/ConvertTrait.php b/src/IFood/Traits/ConvertTrait.php[m
[1mindex afab0fa..a0cc902 100644[m
[1m--- a/src/IFood/Traits/ConvertTrait.php[m
[1m+++ b/src/IFood/Traits/ConvertTrait.php[m
[36m@@ -20,6 +20,8 @@[m [mtrait ConvertTrait[m
     public function toArray()[m
     {[m
         $array = (array) get_object_vars($this);[m
[31m-        return array_filter($array);[m
[32m+[m[32m        return array_filter($array, function($item){[m
[32m+[m			[32mreturn $item !== "" && $item !== 0 && $item !== null;[m
[32m+[m		[32m});[m
     }[m
 }[m
\ No newline at end of file[m
