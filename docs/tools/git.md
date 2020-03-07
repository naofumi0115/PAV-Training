# Overview
In Software developmenent, there are many things to do such as get the requirements from customer, analysts the requirement, coding, test, deploy, etc.

Each phrase, you need to do it. for instance, you may need the microsft office (words, execel) to note the requirement from the customer and transfer that document to develop team.

In coding phrase, to easier in coding and develop fast, support debugger, etc, you may have a good editor, for example, if you are PHP develop, you may need `PHP Storm` or `Visual studio code`.

And to save your source code and manage the source was contribute from other team member. `git` is a good choice. In the past, `SVN` is famouse, but now, it's `git`.

# Tools
## 1. Git
### 1.1 What is git?
Git is `version control system`. It's free and open source. Git supplies you an easy way to manage the verion of your source code.

### 1.2 Why git?
- Save your source code safe.
- Git small and fast. [Benchmarks here](https://git-scm.com/about/small-and-fast)
- Easier when you want to revert previouse code version
- Resolve the conflict easier


### 1.3 How to use.
I will introduce to you some basic and ussually to use when you are working.

**1.3.1  Install Git.**

If you are using Mac, ealier version, `git` may be installed by default.

if you are using windows OS, you can download and install git [here](https://git-scm.com/downloads). Just one click.

1.3.2. Create a git repository.
There are many git services that was implemented from `git` and allow you use without fee (free) such as [GitHub](https://github.com), [GitLab](https://gitlab.com), [Atlassian](https://www.atlassian.com/git)

In this one, I use Github to make example. To know how to create a GitHub repo, check previouse section HTML-CSS-JS at item [1.1 Prepare your project](./../../exercises/tut1.md#11-prepare-your-project)

**1.3.3. Use some basic commands**
- Create branch
```sh
# way 1
git branch your-branch-name

# a new branch <your-branch-name> was created and cloned from current branch and current branch will not switch to new branch


# way 2
git checkout -b your-branch-name

# similar way 1, but it switch to new branch <your-branch-name>
```

**Example:**
```sh
--------- master            # step1. your current branch here
    |                       # step2. git checkout -b branch-1
    | (cloned)
    ----------- branch-1    # step3. now your current branch is branch-1

```

- List all branch at the local
  ```sh
git branch [option]  # option means can have or not

# offen usage: -v: get more info about last commit and message
# -r: list remote branch
  ``
> every command, you can add `--help` to get more explain
> example: `check git branch --help`

- View what files are changing
```sh
git status
```
Example:
![git status](./images/git-status.png)

- `add` (like save a MS Word file you are editting) files are changing and `commit` (like close MS word) and `push` your file to remote repository (on the cloud)
```sh
git add [path-to-file]  # syntax

git add . # . mean all files
git add

```
> **Reference:**
- [basic overview](https://levelup.gitconnected.com/what-is-git-how-to-use-it-why-to-use-it-explained-in-depth-76a5066abaaa)

## 2. Basic linux commands

## 3. Others
### 3.1 Understand about permision, kill process, ports

### 3.2 Some ways to set environements and its scope.