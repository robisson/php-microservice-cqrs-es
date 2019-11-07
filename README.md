# A Microservice boilerplate using CQRS + Event Sourcing
[![Build Status](https://travis-ci.org/robisson/php-microservice-cqrs-es.svg?branch=master)](https://travis-ci.org/robisson/php-microservice-cqrs-es)


**Built with:**
- Docker
- PHP 7.3
- Zend expressive

## Getting Started

Start your new Expressive project with composer:

```bash
$ cd docker
$ docker-compose up -d
```

After build image and run container with docker composer

```bash
$ composer install
$ composer run --timeout=0 serve
```

## Workflow application