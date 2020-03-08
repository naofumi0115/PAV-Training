# SQL best practice 

## SQL best practice #1: Space and new lines

### Problem

You have seen me write queries in different styles.

A)
```sql
SELECT * FROM flight_delays WHERE origin = 'PHL' AND time_delays > 6;

```
B)
```sql
SELECT *
FROM flight_delays
WHERE origin = 'PHL' AND time_delays > 6
```
C)
```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  AND time_delays > 6;
```
These three are the same query. Spaces and line breaks do not affect the outcome of an SQL query. 
Apart from that you can use as many spaces and line breaks between the different keywords as you want.

### Solution

So which style is the best? There is nothing like a set-in-stone rule to answer this question. It depends on many things (and mostly on personal preference), but just in general: people tend to use version C) the most. Why? Because that’s the easiest to read.
You can experiment with your own SQL style, but I suggest following these 3 simple recommendations:

1. Use line breaks at least before the main clauses (e.g. SELECT, FROM, WHERE, etc.). I prefer to use them before column names, table names, and each WHERE condition too…
2. Use indentation for column names, operators (AND, OR) and similars!

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  AND time_delays > 6;
```

## SQL best practice #2: Aliases

### Problem

Using the [SQL functions](https://www.w3schools.com/sql/sql_ref_sqlserver.asp) will give new names to your newly generated columns by default. For example, when we have calculated averages for different segments in the previous episode, the new column’s name – that contained the actual averages – was avg. 

- SQL example:
```sql
SELECT
  AVG(depdelay),
  origin
FROM 
  flight_delays
GROUP BY 
  origin;
```

- Output
```sql
AVG(depdelay)        origin
--------------- -----------------
            5                   1
            6                   2
            8                   3
```

### Solution

1. Using AS assigns the new header name temporarily. The change is effective only in the specific SQL query.
2. The whole point of aliasing is to simplify and shorten the names and make the readability and usability of your code better. 

- For example: 

Using average_depdelay instead of avg, we can achieve it like this:

```sql
SELECT
  AVG(depdelay) AS average_depdelay,
  origin
FROM 
  flight_delays
GROUP BY 
  origin;
```

- Output
```sql
average_depdelay        origin
---------------- -----------------
            5                   1
            6                   2
            8                   3
```

## SQL best practice #3: Comments

### Problem

Please review the below sql code:

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  AND time_delays > 6;
```

What is time_delays > 6 ?


### Solution

So the next SQL best practice is about helping yourself remember stuff!
Commenting your code is highly recommended in any programming language. For instance, if you are working in a team, it helps the team to understand your code.

1.

- Syntax
```
Using -- symbol
```
A comment started with **--** symbol must be at the end of a line in your SQL statement with a line break after it. 
This method of commenting can only span a single line within your SQL and must be at the end of the line.

- Example:

```
-- comment goes here
```

2.

-Syntax 
```
Using /* and */ symbols
```
A comment that starts with '/*' symbol and ends with '*/' and can be anywhere in your SQL statement. 
This method of commenting can span several lines within your SQL.

- Example:

```
/* comment goes here */
```

Example - Comment on a Single Line

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  -- add condition time delays is over 6 hours
  AND time_delays > 6;
```

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  /* add condition time delays is over 6 hours */
  AND time_delays > 6;
```

Example - Comment on Multiple Lines

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  /* 
   * Author: PAV-member
   * Purpose: time delays is over 6 hours 
   */
  AND time_delays > 6;
```

### Uses

- Comment is a programmer-readable explanation. They are added with the purpose of making the source code easier for humans to understand. How best to make use of comments? We suggest some viewpoints such as:

1. Documentation for SQL statements

Comments sometimes store as simplify the documentation process
```sql
/* 
* Author: PAV-member
* Purpose: Get all flight delays which have delay times over 6 hours 
*/
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  AND time_delays > 6;
```

2. Sql code description

Comments can be used to summarize sql code or to explain the programmer's intent.

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  /* 
   * Author: PAV-member
   * Purpose: time delays is over 6 hours 
   */
  AND time_delays > 6;
```

```sql
/* 
* Author: PAV-member
* Purpose: Get all flights which have delay times over 6 hours 
*/
SELECT
  *
FROM
  -- stored all flights 
  flights
INNER JOIN
  -- selects records that have matching flight_id in flights and flight_delays tables 
  flight_delays on flights.flight_id = flight_delays.flight_id
WHERE
  origin = 'PHL'
  /* 
   * Author: PAV-member
   * Purpose: time delays is over 6 hours 
   */
  AND time_delays > 6;
```

## SQL best practice #4: ORDER BY column name

### Problem

When you use ORDER BY and GROUP BY, you can use column names (as we have done so far) but you can also use column numbers (that’s the new thing).

SQL query using column names example :
```sql
SELECT
  AVG(depdelay),
  origin
FROM 
  flight_delays
GROUP BY 
  origin
ORDER BY 
  origin;
```

SQL query using column number example :
```sql
SELECT
  AVG(depdelay),
  origin
FROM 
  flight_delays
GROUP BY 
  2
ORDER BY 
  2;
```
The 2 after the ORDER BY clause refers to “origin” – that’s the second column in our query. (If it were 1, it would be ordered by the first column, AVG(depdelay).)
If you use column names, everything will just work fine. If you use column numbers instead, your query will order by the wrong column (because you should have changed the column number in the ORDER BY clause too, but you might have forgotten).

### Solution 

1. Always use the actual name of the columns when you refer to them (either in ORDER BY or GROUP BY) and never use the number.

## SQL best practice #5: Avoid SELECT *


### Problem

Please review the above sql code using SELECT * :

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  -- add condition time delays is over 6 hours
  AND time_delays > 6;
```

### Solution 

1. Use column names, not * .

```sql
SELECT
  flight_id, 
  flight_name, 
  origin, 
  time_delays
FROM
  flight_delays
WHERE
  origin = 'PHL'
  -- add condition time delays is over 6 hours
  AND time_delays > 6;
```

There are tons of [good reasons](https://stackoverflow.com/questions/3639861/why-is-select-considered-harmful) for that, but the top two are efficiency and readability. If you need one column from a table, why would you print all of them? It would mean you have to move more data from your SQL server to your computer – slowing down the process unnecessarily. And at the same time, if you add * and not column names in your query, you won’t have any clue what columns you have in your data table when you want to change something…


## Exercise 

Check dummy data from [Exercise SQL Database](https://github.com/lappv/PAV-Training/tree/sql/crud#precondition)

### Problem

Write a query to get agents who have greater than or equal to two 'customer'.

SQL Code:
```sql
SELECT
 *
FROM
 `agents`
WHERE
  (SELECT COUNT(`customer`.`AGENT_CODE`)
FROM
  `customer`
WHERE `customer`.`AGENT_CODE` = `agents`.`AGENT_CODE`) >= 2 
```

### Solution

Based on sql best practice:

Step 1: We need to format the sql statement.
```sql
SELECT
  *
FROM
  `agents`
WHERE
  (
  SELECT 
  	COUNT(`customer`.`AGENT_CODE`)
  FROM
    `customer`
  WHERE
    `customer`.`AGENT_CODE` = `agents`.`AGENT_CODE`
) >= 2
```

Step 2: We need to add some comments to explain to logic.
```sql
/*
*  Author: PAV
*  Purpose: Get all agents who have greater than or equal to two 'customer.
*/
SELECT
  *
FROM
  `agents`
WHERE
  (
  SELECT 
  	COUNT(`customer`.`AGENT_CODE`) -- count customers by agent code
  FROM
    `customer`
  WHERE
    `customer`.`AGENT_CODE` = `agents`.`AGENT_CODE`
) >= 2
```

Step 3: Change SELECT * to all columns name.

```sql
/*
*  Author: PAV
*  Purpose: Get all agents who have greater than or equal to two 'customer.
*/
SELECT
  `agents`.AGENT_CODE,
  `agents`.AGENT_NAME,
  `agents`.WORKING_AREA,
  `agents`.COMMISSION,
  `agents`.PHONE_NO, 
  `agents`.COUNTRY
FROM
  `agents`
WHERE
  (
  SELECT 
  	COUNT(`customer`.`AGENT_CODE`) -- count customers by agent code
  FROM
    `customer`
  WHERE
    `customer`.`AGENT_CODE` = `agents`.`AGENT_CODE`
) >= 2
```

## HomeWork

1. (**Easy**) To get the columns 'working_area', average 'commission' and number of agents for each group of 'working_area' from the 'agents' table with the following condition : number of agents for each group of 'working_area' must be less than 3,

the following SQL statement can be used:

SQL Code:
```sql
select working_area, avg(commission),count(agent_name) from agents
having count(agent_name)<3
group by working_area order by 2,3 desc;
```

Based on sql best practice, Please fix the above sql code.
