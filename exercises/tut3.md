> Because this is just another way to store data at the client, just study how to use its API, so there is no exercise here. Just homeworks only.

# Problem
 - You want to keep your letter while writing even you did not click the send button
# Solution

# Homeworks
1. Create a tool that remove the duplication of each line.
Example:
```
this is a line
this is another line
this is a line
line 1
line 3
line 1

// result
this is a line
this is another line
line 1
line 3
```

Require:
There are 2 columns
- 1st column: a texteare quite large to input the text.
- 2nd column: to show the result after remove the duplicated lines.
you will create the layout by yourself

2. Create a convert tool that convert a string have the type from snake case to camel case and vice versus.

Example:

| Input value  | Target     | Result
-------------  | -------    | --------
USER_ID        | camel case | userId
USER_ID        | snake case | user_id
user_id        | camel case | userId
userId         | snake case | user_id

## Require:
Have the checkbox to add some more action
- add modifier: `public` (default), `protected`, `private`
- add data type: `String, Integer, Boolean`
- The layout was made by you

example:

| Input value  | Target     |   options (check on)              | Result
-------------  | -------    |   ------                          | --------
USER_ID        | camel case |   protected, Integer              | protected Integer userId;

