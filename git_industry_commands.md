## Git Configuration Commands

  1)command:User Name
    Syntax:git config --global user.name "your name"
    Purpose:This command sets the global username for Git.
    Ex: git config --global user.name "Bhanu karthik"
    Proof:![git config](GitImages\username.png)

  2)command:User Email
    Syntax:git config --global user.email "your_email@example.com"
    Purpose:This command sets the global email address for Git.
    Ex:git config --global user.email "n220548@rguktn.ac.in"
    Proof:![git config](GitImages\email.png)

  3)command:git config --list
    Syntax:git config --list
    Purpose:Displays all Git configuration settings currently set.
    Ex:git config --list
    Proof:![git config](GitImages\list.png)

  4)command:git config --global --unset
    Syntax:git config --global --unset user.email
    Purpose:Removes a previously set configuration value.
    Ex:git config --global --unset user.email
    Proof:![git config](GitImages\unset.png)

## Repository setup commands

  1)command:git init
    Syntax:git init
    Purpose:
        Initializes a new Git repository in the current directory.
        Creates a hidden .git folder that tracks versions.
        Used when starting a project from scratch.
    Ex:mkdir lab6
       cd lab6
       git init
    Proof:![git config](GitImages\init.png)

  2)command:git clone
    Syntax:git clone <repository_url>
    Purpose:
        Creates a copy of an existing remote repository.
        Downloads:
            All files
            Full commit history
            All branches
    Proof:![git config](GitImages\clone.png)

  3)command:git clone --branch
    Syntax:git clone --branch <branch_name> <repository_url>
    Purpose:
       Clones a repository.
       Checks out a specific branch instead of default (main).
    Proof:![git config](GitImages\clonebranch.png)

  4)command:git clone --depth
    Syntax:git clone --depth <number> <repository_url>
    Purpose:
        Performs a shallow clone.
        Downloads only the latest <number> of commits.
        Saves time and storage.
    Proof:![git config](GitImages\clonedepth.png)

## Repository Status & Inspection

  1)command:git status
    Syntax:git status
    Purpose:
        Shows the current state of the repository.
        Displays:
            Current branch
            Modified files
            Staged files
            Untracked files
    Proof:![git config](GitImages\status.png)

  2)command:git log
    Syntax:git log
    Purpose:
        Displays full commit history.
        Displays:
            Commit ID
            Author
            Date
            Commit message
    Proof:![git config](GitImages\log.png)

  3)command:git log --oneline
    Syntax:git log --oneline
    Purpose:
        Displays compact commit history.
        Displays short Commit ID + message
        one commit per line
    Proof:![git config](GitImages\oneline.png)

  4)command:git log --graph
    Syntax:git log --graph --oneline --all
    Purpose:
        Displays branch structure visually
        show merges and branch flow
    Proof:![git config](GitImages\graph.png)

  5)command:git show
    Syntax:git show <commit_id>
    Purpose:
        show details specific commit 
        Displays:
            Author
            Message
            changes made
    Proof:![git config](GitImages\show.png)

  6)command:git diff
    Syntax:git diff
    Purpose:
        show changes not staged for commit
        Compares working directory with staging area
    Proof:![git config](GitImages\show.png)