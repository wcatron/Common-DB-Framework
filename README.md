# Common DB Framework
Common classes shared between DB Frameworks that want to link between each other.

## Getting Started

Common DB is not a database connection itself, instead it serves as a starting point for various DB frameworks. Currently 
there are two:

- [MongoDB Framework](https://github.com/wcatron/MongoDB-Framework-PHP)
- [MySQL Framework](https://github.com/wcatron/MySQL-Framework-PHP)
- *Coming Soon: Postgres Framework*

## Default Hierarchy

Any framework will need a Database class that inherits the `DB` class and handles the connection to the database. Then
there needs to be a default object class that handles specific object related tasks unique to your database type. For
example in MongoDB (a document based database) the default object class is `Document` all classes using that framework 
will inherit from that class. For MySQL the default object class is `Row`. These classes should also set the `$dbClass`
static variable to your frameworks class that inherits `DB`. This allows for dependency injection later on. How the 
framework is used from this point is dependant on the framework.

### LinkedObject

If setup properly there are helpful classes like LinkedObject which can be used to link a DBObject from one framework/DB
to a DBObject from a different framework. Examples can be found in the MongoDB and MySQL frameworks.

## Singleton vs Dependency Injection

DB instances can be accessed by using `DB::getInstance()` which will access a singleton instance of the DB framework.
However Common DB has built in support for Dependency Injection. When in a DBObject class use `static::getDBInstance()`
to access the DB object being used for that class. This means you can setup a TestDB class that forces a particular output
and then call your default object class setDBInstance() function (i.e. `Row::setDBInstance(TestDB::class)`) to inject
the dependency. This *will* setup a singleton, but it will be a new singleton and can be of any class that inherits DB.

