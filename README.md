# A Microservice boilerplate using CQRS + Event Sourcing
[![Build Status](https://travis-ci.org/robisson/php-microservice-cqrs-es.svg?branch=master)](https://travis-ci.org/robisson/php-microservice-cqrs-es)
[![Coverage Status](https://coveralls.io/repos/github/robisson/php-microservice-cqrs-es/badge.svg?branch=master)](https://coveralls.io/github/robisson/php-microservice-cqrs-es?branch=master)

This is a very simple example application with two endpoints, where it is simulated the creation of a project that has a name attribute and the listing of all registered projects.

**Built with:**
- Docker
- PHP 7.3
- Zend expressive
- Eloquent ORM

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
<img src="cqrs-event-source.png"
     alt="Markdown Monster icon"
     style="float: left; margin-right: 10px;" />