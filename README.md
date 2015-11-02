# Encryption


### What this is
This repo is the code I use for encrypting and hashing things on my websites.

In this API I use:
* The Mcrypt PHP API
* SHA256 encryption algorithm with a 256 bit salt.
* Bcrypt hash with a 516 bit salt.
<i>The code is also configured to level up the cost if the system it's running on can compute faster than normal machines.</i>

### What this isn't

This is not a replacement for your system encryption. Don't try and use this instead of a whole disk encryption software (like Truecrypt or VeraCrypt).
This is not a replacement for HTTPS. For this to be secure you <b>MUST</b> use HTTPS or the password will be sent over plain text.
You still need good server and website security. This just helps with the database.

### When to use it

Since there's both hashing and encryption I'll go over which senarios to use which one.

* Login authentication and password storing - Hashing (Can't be decrypted)
* File encryption and other data encryption which you want to be able to decrypt things - Encryption

### Installation

1. Clone the project `git clone https://github.com/Carlgo11/Encryption.git`
2. Copy the `lib/Encryption` folder to your own working directory.
3. Add the `Encryption.php` and `Config.php` file to your webpage. (See below)
```
include_once 'lib/Auth/Encryption.php';
include_once 'lib/Auth/Config.php';
```
4\. Lastly, call the functions by doing:
```
Encryption::<function>
```
For more info see [index.php](index.php)
