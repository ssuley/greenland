#git command

#Configure Git
git config --global user.name "your_username"
git config --global user.email "your_email_address@example.com"
git config --global --list

#Clone a repository
Clone with SSH
git clone git@gitlab.com:gitlab-tests/sample-project.git
Clone with HTTPS
git clone https://gitlab.com/gitlab-tests/sample-project.git

#Convert a local directory into a repository
git init

#Add a remote
git remote add origin git@gitlab.com:username/projectpath.git

#View your remote repositories
git remote -v

#Download the latest changes in the project
git pull <REMOTE> <name-of-branch>
git pull origin master

#Create a branch
git checkout -b <name-of-branch>

#Switch to a branch
git checkout main

#View differences
git diff

#View the files that have changes
git status

#Add and commit local changes
git add <file-name OR folder-name>
git add .
git commit -m "COMMENT TO DESCRIBE THE INTENTION OF THE COMMIT"

#Stage and commit all changes
As a shortcut, you can add all local changes to staging and commit them with one command: 
git commit -a -m "COMMENT TO DESCRIBE THE INTENTION OF THE COMMIT"

#Send changes to GitLab.com
git push <remote> <name-of-branch>
git push origin main|master

#Delete all changes in the branch
git checkout .

#Unstage all changes that have been added to the staging area
git reset

#Undo most recent commit
git reset HEAD~1

#Merge a branch with default branch
git checkout <default-branch>
git merge <feature-branch>