# Exercise
## Problem.
I'm working with a project with many repositories. So every morning, I need to pull the latest code from the master after booting my laptop to prevent out of date when I am updating something.

Assume that I'm working on these repos [material](https://github.com/angular/material), [rxjs](https://github.com/ReactiveX/rxjs), [libimobiledevice](https://github.com/libimobiledevice/libimobiledevice) and [ansible](https://github.com/ansible/ansible)

## Solution
- write a script to do all my common tasks and allow it to run at the startup time.

## How
1. Structure folder and Fetch all repos
```sh
# create workspace directory
mkdir ~/workspace

cd ~/workspace

git clone git@github.com:angular/material.git
git clone git@github.com:ReactiveX/rxjs.git
git clone git@github.com:libimobiledevice/libimobiledevice.git
git clone git@github.com:ansible/ansible.git

```

now in workspace, you have 4 project folders `material`, `jxjs`, `libimobiledevice` and `ansible`
```sh
cd ~/workspace
ls -la # check current directories
```

next, create a script named `fetch-repos.sh` in workspace,

Assume that:
-  `master` is the main branch that the team is working on.
-  There is no change in your repo (your current change has been commit)

```sh
# ~/workspace/fetch-repos.sh
cd ~/workspace # change working directory
touch fetch-repos.sh # create a empty file
vi fetch-repos.sh # open file fetch-repos.sh to edit and press `i` to enter edit mode

# input below command in fetch-repos.sh file.
cd ~/workspace
cd material
git checkout master
git pull origin master

cd ..    # back to workspace directory
cd rxjs  # go to rxjs directory
git checkout master
git pull origin master

cd ../libimobiledevice  # go to libimobiledevice directory
git checkout master
git pull origin master

cd ../ansible  # go to libimobiledevice directory
git checkout master
git pull origin master

# After done your input, press: `esc` then pres `:`  + `x` to save and quite fetch-repos.sh file

```

Try to run `fetch-repos.sh`
```sh
cd ~/workspace
./fetch-repos.sh
```

What is the result? You cannot run that file? Why is that? What is the message?

// you message like this?
```txt
permission denied:
```

It's because the `fetch-repos.sh` does not have the execute permission. So, set the execute permission for it.
```sh
cd ~/workspace
chmode +x `fetch-repos.sh` # add execute permission
```

Now try again. Is it run okay?


# Homeworks
1. (Easy: 10 min) create a bash file that print some content (example hello world!).
   Set its permission to able to execute (execute permission, do not use +x as above)
2. (Easy: 30 min) Using commands
   - Open your Visual Studio Code and use kill command to kill it
   - create below directory from your home directoy `~/tmp/tmp1/tmp2/tmp3/tmp4/tmp5` (just use only 1 command and use 1 times to create all folder)
   - Rename directory `tmp3` to `tmp3-sub`
   - restart your computer
   - create a zip file for folder `tmp2`
   - create tar file for folder `tmp3`
   - create a custom command `ll` to do the task similar with `ls -la`. It means, when I input `ll` and enter in the termial window, the result is the same when i enter `ls -la`. (Remember, Just setup 1 time, and you can do it everytime when open the termial window)
   - create a file in `~/tmp/test.txt` and put below content inside test.txt by `just 1 command and 1 time`

  `If the first character is a - the item is a file, if it is a d the item is a directory. The rest of the string is three sets of three characters. From the left, the first three represent the file permissions of the owner, the middle three represent the file permissions of the group and the rightmost three characters represent the permissions for others. In each set, an r stands for read, a w stands for write, and an x stands for execute.`

- (Easy: 10 min) Find the word `character` in test.txt file.
- (Medium: 15 min) Print to console (terminal console) the Count of the `character`, how many words Occurrences
- (Hard: 1hour): Refactor above exercise and put all your repos to an array and then loop through that array, then fetch each repo
