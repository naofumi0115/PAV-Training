# SQL Subqueries

## Introduce subquery in SQL

- A subquery is a SQL query nested inside a larger query.

- A subquery may occur in :
1. A SELECT clause
2. A FROM clause
3. A WHERE clause

-The subquery can be nested inside a SELECT, INSERT, UPDATE, or DELETE statement or inside another subquery.

- A subquery is usually added within the WHERE Clause of another SQL SELECT statement.

- You can use the comparison operators, such as >, <, or =. The comparison operator can also be a multiple-row operator, such as IN, ANY, or ALL.

- A subquery is also called an inner query or inner select, while the statement containing a subquery is also called an outer query or outer select.

- The inner query executes first before its parent query so that the results of an inner query can be passed to the outer query.

You can use a subquery in a SELECT, INSERT, DELETE, or UPDATE statement to perform the following tasks:

- Compare an expression to the result of the query.
- Determine if an expression is included in the results of the query.
- Check whether the query selects any rows.

### Syntax :

!()[./subquery-syntax.png]

- The subquery (inner query) executes once before the main query (outer query) executes.
- The main query (outer query) use the subquery result.

### SQL Subqueries Example :

#### Problem
In this section, you will learn the requirements of using subqueries. We have the following two tables 'student' and 'marks' with common field 'StudentID'.
!()[./student.png]
!()[./marks.png]

Now we want to write a query to identify all students who get better marks than that of the student who's StudentID is 'V002', but we do not know the marks of 'V002'.

#### Solution

- To solve the problem, we require two queries. 
One query returns the marks (stored in Total_marks field) of 'V002' and a second query identifies the students who get better marks than the result of the first query.

First query: Get Total_marks of StudentID is 'V002'

```sql
SELECT
  *
FROM
  `marks`
WHERE
  studentid = 'V002';
```

Query result:
+------------+----------------------+
| StudentID  | Total_marks          | 
+------------+----------------------+
| V002       | 80                   | 

The result of the query is 80.

- Using the result of this query, here we have written another query to identify the students who get better marks than 80. Here is the query :

Second  query: Get all students have marks than 80

```sql
SELECT
  a.studentid,
  a.name,
  b.total_marks
FROM
  student a,
  marks b
WHERE
  a.studentid = b.studentid AND b.total_marks > 80;
```

Query result:
+------------+----------------------+----------------------+
| StudentID  | Name                 | Total_marks          | 
+------------+----------------------+----------------------+
| V001       | Abe                  | 95                   |
| V004       | Adelphos             | 81                   |

Above two queries identified students who get the better number than the student who's StudentID is 'V002' (Abhay).

You can combine the above two queries by placing one query inside the other. The subquery (also called the 'inner query') is the query inside the parentheses. See the following code and query result :

SQL Code:

```sql
SELECT
  a.studentid,
  a.name,
  b.total_marks
FROM
  student a,
  marks b
WHERE
  a.studentid = b.studentid AND b.total_marks >(
  SELECT
    total_marks
  FROM
    marks
  WHERE
    studentid = 'V002'
);
```