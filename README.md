# Laravel Encrypt / Decrypt File
[![License](https://img.shields.io/packagist/l/ajthinking/tinx.svg)](https://packagist.org/packages/ajthinking/tinx)


Encrypt or decrypt file and choose location and name of the file too,
<img src="https://i.ibb.co/BP5LftM/task.png" title="source: imgur.com" />

## Contents

- [Installation](#installation)
- [Usage](#usage)
  * [Reload your Tinker session](#reload-your-tinker-session)
  * [Magic models](#magic-models)
  * [Naming strategy](#naming-strategy)
  * [Names](#names)
  * [Fast factories](#fast-factories)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)
  
## Installation

To install Enc/Dec File, simply :


```bash
1. clone the project.
2. composer install
3. php artisan serve
```

`_Laravel version: 6*
php version: 7.3_`

## Usage

From the command line, instead of running `php artisan serve`, run:

```
php artisan serve
```

### Choose A File to Upload

To get file information:-

```
Button: getFileInformation
```

to Encrypt file:

```
you need to select file and a name for that file
```
to Decrypt file:

```
same for decrypt
```

### Development strategy

- By using one form, and three buttons,
- One Controller, One Action Method,
- In which it handels all of the three operations via Switch statements

## Configuration
if you would like to increase file upload size
edit php.ini
```
post_max_size=15M
upload_max_filesize=15M
```



## License
For SoftLock <br>
MIT
