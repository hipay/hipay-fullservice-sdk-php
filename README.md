# hipay-fullservice-sdk-php

#### HTTP client

#### PHP versions

The minimal php version is 5.4.0

This choice is due to the use of the interface JsonSerializable for request objects. 
And for new funny syntax object like (new Foo())->bar() or (new FooBar())->foo()->toArray()[0].    
In first, we have choosen 5.3.3 for minimal version. This due to new constructor class treatment.  

 > As of PHP 5.3.3, methods with the same name as the last element of a namespaced class name will no longer be treated as constructor. 
 > This change doesn't affect non-namespaced classes.
