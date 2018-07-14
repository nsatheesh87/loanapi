# Lumen API Application for Bank Transaction

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

This is for demo purpose.

##Setup

###Step 1: 
Git clone the repository

##Step 2:
Composer update and run the migrations

###Customer Section
sample end points:
Create customer: http://aspire.dev/api/v1/customer {POST}

Sample json request:

```
{
    "firstname": "Satheesh",
    "lastname": "Narayanan",
    "email": "satheesh@satheesh2.com"
}
```
Sample response
```
{
    "firstname": "Satheesh",
    "lastname": "Narayanan",
    "email": "satheesh@satheesh2.com",
    "updated_at": "2018-07-14 06:33:37",
    "created_at": "2018-07-14 06:33:37",
    "id": 1
}
```
List customer: GET http://aspire.dev/api/v1/customers
Show Customer: GET http://aspire.dev/api/v1/customer/5

###Loan Section
Create Loan:http://aspire.dev/api/v1/loan {POST}
```
{
    "customerId": "1",
    "title": "Personal loan",
    "duration": "12",
    "repayment_frequency": "2",
    "interest_rate": "2",
    "amount": "50000",
    "arrangement_fee": "20"
}
```

List all loans: http://aspire.dev/api/v1/loans

http://aspire.dev/api/v1/repay
###Repay section

```
{
    "loanId": "1",
    "amount": "8503.33"
}
```

for other endpoints , please refer web.php under routes directory

