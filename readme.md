## About Miniel

Miniel is a super fast lightweight PHP framework built off the inspiration of Laravel and based on the MVC design principle.
It is not a total replacement for the Laravel framework.

It is fully plug and play, as packages that extends its functionality can be created and added by developers.

It is expected that these packages are written optimally in order to be both efficient, secure and as light as possible while achieving it's objective.

## Use Cases
Miniel can be used for simple web applications like blogs, demos, presentations, etcetera.

## Getting Started
Getting started with Miniel is pretty easy and simple. It can be cloned from the repo here and used straight away.

Learning how to use Miniel is easy as you can follow the documentation.


## Hot To

   * HOW TO DO BASIC SQL COMMANDS E.G select, update, delete, insert
   
   >INSERT
    
   String $tablename = 'users'
   
   Array $data = array(['name' => 'John Doe']);
    
   RUN
   
   DB::table($tablename)->insert(array $data);
   
   
   SELECT (Without Clauses)
   
   String $tablename = 'users'
   
   Array $columns = array(['name']);
   
   DB::table($tablename)->select($columns);
   
   -
   SELECT (With Clauses (WHERE... AND... & WHERE... OR...))
   
   String $tablename = 'users'
   
   Array $columns = array(['name']);
   
   Array $andClause = array(['column' => 'value']);
   
   Array $orClause = array(['column' => 'value']);
   
   "SELECT 'columns' FROM $tablename WHERE id=1 OR name='John'"
   
   DB::table($tablename)->select($columns)->where($andClause)->orWhere($orClause)->execute();