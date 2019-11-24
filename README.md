# LiteOTP
> LiteOTP is a Simpe OTP API Client,

  - Simple to use
  - Support PHP5

## Installation

requires [php](https://php.net ) to run.

### Install the dependencies and software.
For Linux environments

```sh
$ sudo apt install php php-curl curl
$ sudo curl https://raw.githubusercontent.com/Cvar1984/LiteOTP/master/build/main.phar --output /usr/local/bin/lite
$ chmod +x /usr/local/bin/lite
$ lite /foo/bar/test_list.txt
$ lite $PWD/test_list.txt
```

For Android Termux environments

```sh
$ apt install php curl
$ curl https://raw.githubusercontent.com/Cvar1984/LiteOTP/master/build/main.phar --output $PREFIX/bin/lite
$ chmod +x $PREFIX/bin/lite
$ lite /foo/bar/test_list.txt
$ lite $PWD/test_list.txt
```
### Exaxmple class usage
```php
// from root directory
require __DIR__.'/src/class.php';
try {
    $test=new Otp();
    $number_phone='+628xxxxxxxx';
    $number_phone=trim($number_phone);
    $test->sendOtp((int)$number_phone,'api_server');
    var_dump((array) $test);
} catch(Exception $e) {
    echo $e->xdebug_message;
}
```

### Todo

 - Add more API
 - Support international phone number
 - get status code

License
----
> Copyright (C) Cvar1984, 2019
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
