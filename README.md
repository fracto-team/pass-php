# PassPHP

PassPHP is a port of [pass](https://www.passwordstore.org/) and library for secure password management. Also include 
binary for accessing system-wide/project-wide.

## Installing / Getting Started

> Todo: The project doesn't pubished on `packagist.org`. 

If you want to use in your PHP project:

```bash
$ composer require fracto/pass-php
```

If you want to use it in globally with binary:

```bash
$ composer require fracto/pass-php --global
```

## Developing

Clone repository to working directory.

```bash
$ git clone git@github.com:fracto-team/pass-php.git
```

Download latest version of [phar-composer.phar](https://github.com/clue/phar-composer/releases) to the project directory.

```bash
$ cd pass-php
$ curl -s https://api.github.com/repos/clue/phar-composer/releases/latest | grep "phar-composer.phar" | cut -d : -f 2,3 | tr -d \" | wget -qi -
```

### Building

Create new empty directory to the project directory.

```bash
$ mkdir dist
```

Build project with `phar-composer.phar` file.

```bash
$ php phar-composer.phar build . dist
```

Test new create phar file with php.

```bash
$ php dist/pass-php.phar
```

## Features

- PHP Library for password management with secure.
- `GnuPG` encryption and decryption.
- `Git` version control also support!
- Commandline helper for managing passwords.

## Contributing

Thank you for considering contributing to the PassPHP project! The contribution guide can be found in the [Contributing.md](https://raw.githubusercontent.com/fracto-team/pass-php/master/contributing.md).

## Licensing

The PassPHP library is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
