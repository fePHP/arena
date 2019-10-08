# Symfony4 challenge

This is the repository with the exercise for the ma-residence interview.

Read the contents of this **README.md** carefully as it will help you to set up this exercise.

In this exercise, you will have to code a micro API using Symfony 4

## Getting started

### Prerequisites
This project uses all the classic stack tools needed for a SF4 project so you'll need

* a **web server with PHP** enabled
* a **SQL database** (for example MySQL)
* a **git** client to clone the sources
* the **composer** tool
* the **PHPUnit** testing tool

### Clone the Project skeleton
This repository uses **git**, you should clone it on your machine through a git clone.

### Install the project
The project is set up to be installed through the **composer** tool.

The root of the project contains a *composer.json* file with minimum requirement configured.
You can use composer ton install all dependency you need, you should use the power of Symfony4 with recipe.

### Check your system configuration
After having set up your project, confirm that your `.env` has the correct parameters.
The most important parameters are the database related parameters.

Be sure that you have created the correct database for your project.

## It's up to you now!
Now read the **INSTRUCTIONS.md** file located at the root of the project. It contains all the instructions and hints
for the project.

## Submitting your solution
To submit your solution, you can simply push your work with a *pull request*.

## How you will be evaluated
A bunch of tests have been written under the *tests*

### Controllers Tests
Those tests are functional tests. They will test your API endpoints, the responses etc...

### Services Tests
This folder contains a unit test which will test the final result using a test dataset

### Procedure which will be executed to test your solution
* We will clone your sources
* We will set up the Symfony project
* We will import the database structure with the doctrine tool `./bin/console doctrine:schema:update --force`
* We will launch the tests with PHP Unit `./bin/phpunit`

### About the results
The results are important but there is no unique solution, there are various way to pass the tests successfully.

**Don't forget that you will have to explain and justify your choices during an interview. This exercise is mainly a way
to provide discussion material for it.**
