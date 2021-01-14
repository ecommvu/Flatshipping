[![Github All Releases](https://img.shields.io/github/downloads/ecommvu/Flatshipping/total.svg)]()


**Steps to install:**

1. Inside packages directory make another directory 'Ecommvu'.
2. Inside the directory 'Ecommvu' make another directory 'FlatShipping'.
3. Copy content of this repo inside 'Meta' directory.
4. Goto root of your Bagisto application and open composer.json
and add this line in the psr-4 object -> "Ecommvu\\FlatShipping\\": "packages/Bluelupin/FlatShipping/src"
5. Goto config/app.php file and in the providers array add this line:
Ecommvu\FlatShipping\Providers\FlatShippingServiceProvider::class
6. Perform composer dump-autoload
7. Make sure there are no errors in step 6.
8. Now define your shipping rates on the basis of zip codes, the shipping & price matrix in defined in config/ship_matrix.php
9. In admin config -> sales -> carriers you will find the flat shipping as the shipping method.
10. During checkout when customer enter their zip code in shipping address and it matches the matrix then
they will see the rate defined in the matrix.
