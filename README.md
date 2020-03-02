# SQL best practice 

## SQL best practice #0: The order of your keywords
The order of your SQL clauses counts in your query. This is not even a best practice, this is a must. Looking only at the SQL clauses we have learned so far, this is the proper order:
1. SELECT
2. FROM
3. WHERE
4. GROUP BY
5. ORDER BY
6. LIMIT

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

## SQL best practice #2: Upper case vs lower case

### Problem

You have seen me write queries in different styles.

A)
```sql
SELECT 
	* 
FROM 
	FLIGHT_DELAYS 
WHERE 
	ORIGIN = 'PHL' 
	AND TIME_DELAYS > 6;

```
B)
```sql
select
  *
from
  flight_delays
where
  origin = 'PHL'
  and time_delays > 6;
```
C)
```sql
SELECT
  *
from
  flight_delays
where
  origin = 'PHL'
  AND time_delays > 6;
```

### Solution

1. All reserved SQL keywords (eg. SELECT, AND, OR, GROUP BY, etc.) should be written in capitals.
2. All field values, column names and table names should be written in lowercase (except special situations of course, when the name of the column contains uppercase characters initially).

```sql
SELECT
  *
FROM
  flight_delays
WHERE
  origin = 'PHL'
  AND time_delays > 6;
```

## SQL best practice #3: Aliases

### Problem

Using the [SQL functions](https://www.w3schools.com/sql/sql_ref_sqlserver.asp) will give new names to your newly generated columns by default. For example, when we have calculated averages for different segments in the previous episode, the new column’s name – that contained the actual averages – was avg. Just to recall:
```sql
SELECT
  AVG(depdelay),
  origin
FROM flight_delays
GROUP BY origin;
```

### Solution

1. Using AS assigns the new header name temporarily. The change is effective only in the specific SQL query.
2. The whole point of aliasing is to simplify and shorten the names and make the readability and usability of your code better. 

For example: Using average_depdelay instead of avg, we can achieve it like this:
```sql
SELECT
	AVG(depdelay) AS average_depdelay,
	origin
FROM flight_delays
GROUP BY origin;
```

## SQL best practice #4: Comments

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

1. Type this: --. After the double-dash, nothing in that line will be executed.

Try this:
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

## SQL best practice #5: ORDER BY column name

### Problem

When you use ORDER BY and GROUP BY, you can of course use column names (as we have done so far) but you can also use column numbers (that’s the new thing).

SQL query using column names example :
```sql
SELECT
  AVG(depdelay),
  origin
FROM flight_delays
GROUP BY origin
ORDER BY origin;
```

SQL query using column number example :
```sql
SELECT
  AVG(depdelay),
  origin
FROM flight_delays
GROUP BY origin
ORDER BY 2;
```
The 2 after the ORDER BY clause refers to “origin” – that’s the second column in our query. (If it were 1, it would be ordered by the first column, AVG(depdelay).)
If you use column names, everything will just work fine. If you use column numbers instead, your query will order by the wrong column (because you should have changed the column number in the ORDER BY clause too, but you might have forgotten).

### Solution 

1. Always use the actual name of the columns when you refer to them (either in ORDER BY or GROUP BY) and never use the number.

## SQL best practice #6: Avoid SELECT *


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
  flight_id, flight_name, origin, time_delays
FROM
  flight_delays
WHERE
  origin = 'PHL'
  -- add condition time delays is over 6 hours
  AND time_delays > 6;
```

There are tons of [good reasons](https://stackoverflow.com/questions/3639861/why-is-select-considered-harmful) for that, but the top two are efficiency and readability. If you need one column from a table, why would you print all of them? It would mean you have to move more data from your SQL server to your computer – slowing down the process unnecessarily. And at the same time, if you add * and not column names in your query, you won’t have any clue what columns you have in your data table when you want to change something…
