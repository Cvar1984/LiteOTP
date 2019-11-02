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
require __DIR__.'/src/class.php';
try {
    $test=new Otp();
    $test->sendOtp(trim('number_phone'),'api_server');
    var_dump((array) $test);
} catch(Exception $e) {
    echo $e->xdebug_message;
}
```

### Todo

 - Add more API
 - Support multi country

License
----
> Copyright (C) 2019  <Cvar1984>
>
> This program is free software; you can redistribute it and/or
> modify it under the terms of the GNU General Public License
> as published by the Free Software Foundation; either version 2
> of the License, or (at your option) any later version.
>
> This program is distributed in the hope that it will be useful,
> but WITHOUT ANY WARRANTY; without even the implied warranty of
> MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
> GNU General Public License for more details.
>
> You should have received a copy of the GNU General Public License
> along with this program.  If not, see <http://www.gnu.org/licenses/>.
