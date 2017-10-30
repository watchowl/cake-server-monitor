## CakeServerMonitor
CakePHP 3 Plugin for Monitoring Server Stats

## Installation

+ To install the CakeServerMonitor plugin, you can use composer. From your application's ROOT directory (where composer.json file is located) run the following:

    ```composer require watchowl/cake-server-monitor```

+ You will need to add the following line to your application's `config/bootstrap.php` file:

    ```Plugin::load('Watchowl/CakeServerMonitor',['bootstrap' => true]);```


## Notification
CakeServerMonitor currently supports notification via email. 
You can configure recipients' email addresses in your applications 'config/bootstrap.php' file 
using overwriting the *CakeServerMonitor.email.recipients* key:

```php
Configure::write(
    'CakeServerMonitor.email.recipients',
    ['my-first-email@address.com','my-second-email@address.com']
);
```

## Scheduling task

The last step to make this work is to add a cron job. 
You can do so by adding a similar line as shown below to your system's crontab file. 
Do remember to update the path to your own project. 
The following cron job runs at 1 am every day, you can change it
to your own preference. 

`* 1 * * * cd path && bin/cake monitor run`

## Customisation
CakeServerMonoitor does provide some customisation options. 

+ **Changing email profile**

by default CakeServerMonitor uses the *default*
profile to send an email. You can change it to your own preference using the
*CakeServerMonitor.email.profile* key:
   
```php
Configure::write(
    'CakeServerMonitor.email.profile',
    'debug'
);
```

+ **Changing checking stats**

by default CakeServerMonitor checks following stats:

+ Disk Space
+ MySql Process
+ Nginx Process
+ Php5Fpm Process

Under the hood, each checker is actually a class under WatchOwl
namespace. You can overwrite what checkers to run via the 
*CakeServerMonitor.commands* key:

```php
Configure::write(
    'CakeServerMonitor.commands',
    [
        'disk_space' => 'WatchOwl\CakeServerMonitor\CommandDefinition\DiskSpace',
        'mysql' => 'WatchOwl\CakeServerMonitor\CommandDefinition\MySql',
        'nginx' => 'WatchOwl\CakeServerMonitor\CommandDefinition\Nginx',
        'php5fpm' => 'WatchOwl\CakeServerMonitor\CommandDefinition\Php5Fpm',
    ]
);
```

You can remove any checkers above so it won't run.  

+ **Creating your own checker**

As you might have already guessed, you can create your own checker to extend CakeServerMonitor's abilities.
To do so, creates a class extends from *WatchOwl\CakeServerMonitor\CommandDefinition\CommandDefinition* abstract 
class and implement its defined abstract methods.

After that, add your own checker to the *CakeServerMonitor.commands* key as shown in previous section.


## Helper methods

To view current server stats: 

`bin/cake server_monitor view`