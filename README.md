# identity scanner laravel (OCR , MRZ , Visual and Barcode)
### you can get any data from any identity


![image](https://api.romarkcode.com/storage/images/607403e2823251*cPt2YI-5YxhfL3_Uhw0txA.png)

![me](https://github.com/hussein4alaa/identity-scanner-laravel/blob/main/image2.gif)

## Installation:
Require this package with composer using the following command:

```sh
composer require g4t/id-scanner
```



## Usage
## Add IDScanner to your Controller.
```sh
use g4t\IDScanner\Scanner;
```


##### upload identity image `base64` or `file` :
```sh
Scanner::scan($request->images, 'files');
```
### OR 
```sh
Scanner::scan($request->images, 'base64');
```


### License

identity scanner laravel (OCR , MRZ , Visual and Barcode) is free software licensed under the MIT license.
