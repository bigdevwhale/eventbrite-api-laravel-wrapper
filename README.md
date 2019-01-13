# Laravel Rancher

Rancher API wrapper for Laravel. This package provides a simple interface to Rancher's (awesome) API. Orchestrate your private container service with expressive, clean PHP.


## Installation
Laravel Rancher uses compose to make installation a breeze.


**Install via composer** 
``` bash
composer require benmag/laravel-rancher
```


**Register service provider**
Add the Laravel Rancher service provider to your `config/app.php` file in the providers key
```php
'providers' => [
    // ... other providers
    Benmag\Rancher\RancherServiceProvider::class,
]
```


**Rancher facade alias**
Then add the `Rancher` facade to your `aliases` key: `'Rancher' => Benmag\Rancher\Facades\Rancher::class`.  



## Configuration
Configuration can be done via your `.env` file.
```
RANCHER_BASE_URL=http://localhost:8080/v1/
RANCHER_ACCESS_KEY=xxxxxxx
RANCHER_SECRET_KEY=xxxxxxx
````
>You may also publish the config file to `config/rancher.pzhp` for editing:
`php artisan vendor:publish --provider="Benmag\Rancher\RancherServiceProvider"`
 
### Notes
Make sure you have authentication enabled. Without this, you might experience some weird behaviour. 
I still need to look into changing Environments/Projects in a slightly more coordinated way but you should just be able to instantiate a new client instance.

## Usage
Laravel Rancher is incredibly intuitive to use. 

### Introduction
Already configured everything and just want to see it in action? Take a look at the example code below.
```php
<?php

namespace App\Http\Controllers;

use Rancher;
use App\Http\Controllers\Controller;

class HostController extends Controller
{
    public function index()
    {
        return response()->json(Rancher::host()->all());
    }
}
```

### Host
#### Retrieving all Hosts
``` php
Rancher::host()->all();
```

#### Retrieve Host by ID
```php
Rancher::host()->get("1h1");
```

#### Activate a Host by ID
```php
Rancher::host()->activate("1h1");
```

#### Evacuate a Host by ID
```php
Rancher::host()->evacuate("1h1");
```

#### Remove a Host by ID
```php
Rancher::host()->remove("1h1");
```

### Container
#### Retrieving all Containers 
```php 
Rancher::container()->all();
```

#### Retrieve Container by ID
```php 
Rancher::container()->get("1i140");
```

#### Create a Container 
```php
use Rancher;
use Benmag\Rancher\Factories\Entity\Container;

$newContainer = new Container([
    'name' => 'HelloWorld',
    'description' => 'New container created via Laravel Rancher',
    'imageUuid' => "docker:ubuntu:14.04.3",
]);

Rancher::container()->create($newContainer);
```

### Stack

#### Create a Stack 
```php
use Rancher;
use Benmag\Rancher\Factories\Entity\Stack;

$newStack = new Stack([
    'name' => "my-stack",
    'description' => 'An example stack',
    'dockerCompose' => "odoo:\n  image: odoo\n  ports:\n    - \"8069:8069\"\n  links:\n    - db\ndb:\n  image: postgres\n  environment:\n    - POSTGRES_USER=odoo\n    - POSTGRES_PASSWORD=odoo\n",
    'rancherCompose' => ".catalog:\n  name: \"Odoo\"\n  version: \"0.1-educaas\"\n  description: \"ERP management powered by Odoo\"\n  uuid: odoo-0\n  questions:\n\nodoo:\n",
    'externalId' => "catalog://community:odoo:0",
    'startOnCreate' => true
]);

Rancher::stack()->project('1a8')->create($newStack);
```

When creating a Stack, you will need to tell Rancher which Project you want to create it in. 

#### Update an Stack
```php
use Rancher;
use Benmag\Rancher\Factories\Entity\Stack;

$updatedStack = new Stack([
    'name' => "my-updated-stack",
    'description' => 'An updated stack',
]);

Rancher::stack()->update("1st312", $updatedStack);
```

#### Activate Services in an Stack
```php
Rancher::stack()->activateServices("1st312");
```

#### Deactivate Services in an Stack
```php
Rancher::stack()->deactivateServices("1st312");
```

#### Delete a Stack
```php
Rancher::stack()->delete("1st312");
```


### Project
#### Create a new Project
```php
use Rancher;
use Benmag\Rancher\Factories\Entity\Project;

$project = new Project([
    'name' => 'Hello World',
]);

Rancher::project()->create($project);
```

#### Activate a Project
```php
Rancher::project()->activate("1a8");
```

#### Deactivate a Project
```php
Rancher::project()->deactivate("1a8");
```

#### Delete a Project
```php
Rancher::project()->delete("1a8");
```


### Service
#### Create a Service
```php
use Rancher; 
use Benmag\Rancher\Factories\Entity\Service;

$newService = new Service([
    'name' => 'newService',
    'stackId' => '1st312',
    'launchConfig' => [
        'stdinOpen' => true,
        'imageUuid' => 'docker:ubuntu:14.04.3'
    ],
]);

Rancher::service()->project("1a8")->create($newService);
```

#### Update a Service
```php
use Rancher;
use Benmag\Rancher\Factories\Entity\Service;

$updatedService = new Service([
    "description" => "I was updated",
    "name" => "db",
    "scale" => 1
]);

Rancher::service()->project("1a8")->update("1s23", $updatedService);
```


#### Add a Service Link
You may also add a single service link to the service. You can use the `name` value to specify a link alias.
```php
use Rancher;

$serviceLink = ['name' => 'redis', 'serviceId' => '1s25'];

Rancher::service()->addServiceLink("1s24", $serviceLink);
```

#### Set Service Links
The `setServiceLinks` method will overwrite all of the links for that service.  
```php
use Rancher;

$serviceLinks = [
    ['name' => 'db', 'serviceId' => '1s23']
];

Rancher::service()->setServiceLinks("1s24", $serviceLinks);
```

#### Remove a Service Link
Individual service links can also be removed
```php
use Rancher;

$remove = ['name' => 'db', 'serviceId' => '1s23'];

Rancher::service()->removeServiceLink("1s24", $remove);
```

#### Upgrade a Service
```php
use Rancher;

$serviceUpgrade = [
    'inServiceStrategy' => [
        'batchSize' => 1,
        'intervalMillis' => 2000,
        'startFirst' => false,
        'launchConfig' => [
            'imageUuid' => 'docker:postgres',
            'startOnCreate' => true,
        ]
    ]
];

Rancher::service()->upgrade("1s23", $serviceUpgrade);
```

#### Finish a Service Upgrade
```php
Rancher::service()->finishUpgrade("1s23");
```

#### Cancel a Service Upgrade
```php
Rancher::service()->cancelUpgrade("1s23");
```

#### Rollback an Upgrade 
```php
Rancher::service()->rollback("1s23");
```

#### Cancel Rollback
```php
Rancher::service()->cancelRollback("1s23");
```

### Load Balancer Service
#### Create a Load Balancer
```php
use Rancher; 
use Benmag\Rancher\Factories\Entity\LoadBalancerService;

$newLb = new LoadBalancerService([
    'name' => 'lb',
    'stackId' => '1st316',
    'launchConfig' => [
        'ports' => [
            "80",
            "8080"
        ],
        'imageUuid' => 'docker:rancher/lb-service-haproxy:v0.7.5'
    ],
    'lbConfig' => [
        'portRules' => [
            [
                'hostname' => '',
                'serviceId' => "1s583",
                'sourcePort' => 8080,
                'targetPort' => 80,
                'type' => 'portRule'
            ]
        ]
    ]
]);

Rancher::loadBalancerService()->project('1a8')->create($newLb);
```

#### Update a Load Balancer
```php
use Rancher;
use Benmag\Rancher\Factories\Entity\LoadBalancerService;

$updatedLb = new LoadBalancerService([
    'name' => 'lb-updated',
    'stackId' => '1st316',
    'launchConfig' => [
        'ports' => [
            "80",
        ],
        'imageUuid' => 'docker:rancher/lb-service-haproxy:v0.7.5'
    ],
    'lbConfig' => [
        'portRules' => [
            [
                'hostname' => '',
                'protocol' => 'http',
                'serviceId' => "1s583",
                'sourcePort' => 80,
                'targetPort' => 80,
                'type' => 'portRule'
            ]
        ]
    ],
]);

Rancher::loadBalancerService()->project("1a8")->update("1s26", $updatedLb);
```


#### Add a Service Link to Load Balancer
You may also add a single service link to the service. You can use the `name` value to specify a link alias.
```php
use Rancher;

$serviceLink = [
    'serviceId' => '1s10', 
    'ports' => [
        "hello.world.domain.com=80"
    ]
];

Rancher::loadBalancerService()->addServiceLink("1s27", $serviceLink);
```

#### Set Service Links for Load Balancer
The `setServiceLinks` method will overwrite all of the links for that load balancer.  
```php
use Rancher;

$serviceLinks = [
    [
        'serviceId' => '1s23',
        'ports' => [
            "hello.world.example.com=80",
        ]
    ]
];

Rancher::loadBalancerService()->setServiceLinks("1s24", $serviceLinks);
```

#### Remove a Service Link from Load Balancer
Individual service links can also be removed.
```php
use Rancher;

$remove = ['serviceId' => '1s23'];

Rancher::loadBalancerService()->removeServiceLink("1s24", $remove);
```

### Machine
[todo]

### Registry

#### Add Registry
```php
use Rancher; 
use Benmag\Rancher\Factories\Entity\Registry;

$registry = new Registry([
    'serverAddress' => "registry.example.com",
]);

$registryResponse = Rancher::registry()->project("1a8")->create($registry));
```

#### Activate Registry 

```
use Rancher; 

Rancher::registry()->activate($id);
```


#### Deactivate Registry 

```
use Rancher; 

Rancher::registry()->deactivate($id);
```


### Registry Credential 

#### Add registry credential  
```php
use Rancher; 
use Benmag\Rancher\Factories\Entity\RegistryCredential;

$cred = new RancherRegistryCredential([
    'registryId' => "1sp120",
    'email' => "email@example.com",
    'publicValue' => "username",
    'secretValue' => "password"
]);

Rancher::registryCredential()->create($cred);
```


### Registration Token

#### Create Registration Token
```
use Rancher; 
use Benmag\Rancher\Factories\Entity\RegistrationToken;

Rancher::registrationToken()->create(new RegistrationToken([
    'accountId' => 'rancerProjectId'
]));
```

#### Fetch Registration Tokens
```
use Rancher; 

Rancher::registrationToken()->filter(['state' => 'active'])->get()
```

### Service Consume Map
[todo]

### Certificates

#### Get certificates
```
use Rancher; 
Rancher::certificate()->all();
 ```

#### Create a certificate 
```
use Rancher; 
use Benmag\Rancher\Factories\Entity\Certificate;

$cert = new Certificate([
    'name' => 'My Cert', 
    'description' => 'Hello World',
    'key' => 'Your Private Key', 
    'cert' => 'Your Certificate',
    'certChain' => 'Your Chain Certs',
]);

Rancher::certificate()->create($cert);
```

#### Remove a certificate
```
use Rancher; 
Rancher::certificate()->delete($id);
 ```

### Query Building 
The wrapper also provides a convenient way for you to build fairly elaborate Rancher API requests.
The following methods return the instance so you can chain more constraints onto the request as required.

#### Filters
Rancher lets you specify filters on API resources. The type of filter to apply is set via the key. Listed below is an example of all of the filter options.

```php
$params = [
    'name' => 'Hello World', // name = "Hello World"
    'name_ne' => 'Hello World', // name != "Hello World"
    'name_notnull' => null, // name is not null
    'description_null' => null, // description is null
    'description_notlike' => 'Hello World', // description NOT LIKE '%Hello World%'
    'description_like' => 'Hello World', // description LIKE '%Hello World%'
    'name_prefix' => 'Hello', // name LIKE 'Hello%'
];

Rancher::stack()->filter($params)->get();

```
> Remember: to change the field you filter on, change the key e.g. `['state' => 'active']` or `['description_notnull' => null]`

#### Include
With Rancher, you can specify additional endpoints that should be eager loaded with the request through an `include` parameter. This functionality is exposed via the `with` method.  
```php
Rancher::service()->with(['instances'])->get("1s724");
```

#### Fields
Define additional fields from the API for the entity to dynamically expose. You can use this to enable access properties that are not explicitly defined by the entity class.
```php
Rancher::service()->fields(['uuid'])->get("1s724");
```

#### Scope
By default, Rancher's scope is the default Project your credentials have access too. This chained method lets you easily change the scope to another project your credentials have access to on the fly. 
```php
Rancher::host()->scope('1a3302')->all();
```

Of course, you may utilize the `setClient` method to change the client to something completely new but if you want to change 

#### All together now
Here is a simple example of how you can use method chaining to build elaborate Rancher API requests.
```php
Rancher::services()
            ->scope('1a3302')
            ->with(['instances'])
            ->filter(['environmentId' => "1e512"])
            ->fields(['uuid'])
            ->get()
```


### Handling Exceptions
The Rancher API will return errors as required. I am still looking for a nicer way to handle these exceptions... For the time being, simply wrap your call in a try/catch block.

```php
try {
    
    Rancher::host()->deactivate("1h1");
    
} catch(ClientException $e) {
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();
    echo $responseBodyAsString;
}
```

## Rancher API Endpoint Coverage
The Rancher API is extensive. I've attempted to cover all of the key endpoints  but there are a few endpoints that are currently unimplemented.
- Host `[5/8]`
  - delete
  - dockersocket
  - purge 
- Container `[7/18]`
  - update 
  - delete
  - allocate
  - console
  - deallocate
  - execute 
  - logs 
  - migrate
  - setlabels
  - updatehealthy
  - updateunhealthy
- Environment `[6/14]`
  - addoutputs
  - cancelrollback
  - cancelupgrade 
  - error
  - exportconfig
  - finishupgrade
  - rollback
  - upgrade
- Project `[5/8]`
  - purge 
  - restore
  - setmembers
- Service `[13/14]`
  - remove
- LoadBalancerService `[7/13]`
  - cancelrollback
  - cancelupgrade
  - finishupgrade
  - remove
  - rollback
  - upgrade
- Account `[0]`
- ApiKey `[0]`
- Certificate `[0]`
- DnsService `[0]`
- externalService `[0]`
- Identity `[0]`
- Machine `[0]`
- Mount `[0]`
- ProjectMember `[0]`
- StoragePool `[0]`
- Volume `[0]`

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
