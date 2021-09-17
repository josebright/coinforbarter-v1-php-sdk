# CoinForBarter PHP Library

CoinForBarter Nodejs Library - Integrate and Manage cryptocurrency payments for goods and services

![License, MIT](https://img.shields.io/badge/licence-MIT-black) ![npm, coinforbarter-node](https://img.shields.io/badge/npm-npm%20install%20coinforbarter--node-green) ![yarn, coinforbarter-node](https://img.shields.io/badge/yarn-yarn%20add%20coinforbarter--node-red)

## Table of Contents
---
  - [About](#about)
  - [Getting Started](#getting-started)
    - [Installation](#installation)
  - [Usage](#usage)
  - [Services and Methods](#services-and-methods)
  - [Deployment](#deployment)
  - [Built Using](#built-using)
  - [CoinForBarter API References](#coinforbarter-api-references)


## About
---
This is a NodeJs package for implementing CoinForBarter.

## Getting Started
---
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system. See references for links to dashboard and API documentation.

## Installation
---
```bash
$ npm install coinforbarter-node

# or
$ yarn add coinforbarter-node

```


## Usage
---
```bash
const CoinForBarter = require('coinforbarter-node');

const publicKey = 'xxxxxxxxxxxxx';
const privateKey = 'xxxxxxxxxxxxx';
const secretHash = 'xxxxxxxxxxxxx';
const coinforbarter = new CoinForBarter(publicKey, privateKey, secretHash);

# An example to get all customers
const customers = coinforbarter.Customer.findAll();
```


## Services and Methods
---

1.  ### Customer
This method handles all customers related to your account. The methods exposed by this service are listed below. [See customer object properties](https://developers.coinforbarter.com/api-reference/#customers-get-all-customers)
- #### findAll
This method gets the list of all customers.
```bash
const query = {};
const getAllCustomers = async () => { 
      return await coinforbarter.Customer.findAll(query);
}
```
See list of [query parameters](https://developers.coinforbarter.com/api-reference/#customers-get-all-customers)

- #### findOne
This method gets a particular customer by id.
```bash
const query = {};
const customerId = '';
const getCustomer = async (customerId) => { 
      return await coinforbarter.Customer.findOne(customerId);
}
```

- #### create
This method creates a customer.
```bash
const params = {};
const createCustomer = async (params) => { 
      return await coinforbarter.Customer.create(params);
}
```
See  [customer parameters](https://developers.coinforbarter.com/api-reference/#customers-create-customer)

- #### update
This method updates a customer.
```bash
const params = {};
const createCustomer = async (params) => { 
      return await coinforbarter.Customer.update(params);
}
```
See  [customer update parameters](https://developers.coinforbarter.com/api-reference/#customers-update)


1.  ### BankAccount
- getBankAccountName
- create
- findAll
- findOne
- makePrimary
- getBanks


1.  #### Payment
      ##### Methods
      - findOne
      - findAll
      - create
      - setCurrency
      - lockCurrency
      - getPaymentUpdates
      - cancel


2.  #### PaymentPlan
      ##### Methods
      - findAll
      - findOne
      - create
      - update


3.  #### PaymentPlanSubscriber
      ##### Methods
      - create
      - findOne
      - findAll
      - remove


4.  #### Payout
      ##### Methods
      - findAll
      - findOne


5.  #### Transaction
      ##### Methods
      - findAll
      - findOne
      - verify
      - events
      - getFee
      - webhook


6.  #### Transfer
      ##### Methods
      - findAll
      - findOne
      - create
      - getFee


7.  #### WalletAddress
      ##### Methods
      - create
      - findAll
      - findOne
      - makePrimary


8.  ####  Webhook
      ##### Methods
      - validate


9.  #### Misc
      ##### Methods
      - getCountries
      - getBalance
      - getCurrencies


This SDK can be used closely with the official [API Reference](https://developers.coinforbarter.com/api-reference). All services and methods can be called this way

```bash

const customers = c4b.Customer.findAll();

```
i.e

```bash

 c4b:{
    [service]:method
 }

# I will do more on documenting each method till i can complete it 😂
```



## Built Using
---
- Typescript


## CoinForBarter API References
- [CoinForBarter Developers Doc](https://developers.coinforbarter.com)
- [CoinForBarter API Reference](https://developers.coinforbarter.com/api-reference/)
- [CoinForBarter Inline Payment Doc](https://developers.coinforbarter.com/docs/integration-options-coinforbarter-inline/)
- [CoinForBarter Dashboard](https://dashboard.coinforbarter.com)

## Stay in Touch

- Author - [Nwachukwu, Kingsley Tochukwu](https://linkedin.com/in/tkings)
- Twitter - [@tkings_](https://twitter.com/tkings_)
- Github - [t-kings](https://github.com/tkings)

Contributions are open, meta properties are not being returned yet by this SDK. You can send me an email via [tochukwu@coinforbarter.com](mailto:tochukwu@coinforbarter.com)


