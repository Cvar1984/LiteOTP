# LiteOTP
LiteOTP is a Simpe OTP API Client,
powered By BlackHoleSecurity.

  - Simple to use
  - Easy to development
  - Support PHP5

### New Features!

  - Use PHP Object Oriented Programming ( OOP )


You can also:
  - Run from mobile device like Android
  - Run from Linux/UNIX or Windows

### Installation

requires [php](https://php.net ) >= 5 to run.

Install the dependencies and software.

```sh
$ sudo apt install php php-curl wget
$ sudo wget https://raw.githubusercontent.com/Cvar1984/LiteOTP/master/build/main.phar -O /usr/local/bin/lite
$ chmod +x /usr/local/bin/lite
$ lite /foo/bar/test_list.txt
```

For Android Termux environments

```sh
$ apt install php php-curl  wget
$ wget https://raw.githubusercontent.com/Cvar1984/LiteOTP/master/build/main.phar -O $PREFIX/bin/lite
$ chmod +x $PREFIX/bin/lite
$ lite /foo/bar/test_list.txt
```
### Exaxmple usage
```php
// from root directory
require 'src/class.php';
$test=new otp();
echo $test->otp('number_phone','api_server');
```

### Todo

 - Add more API
 - Support multi country

License
----

MIT

**Free Software, Hell Yeah!**
