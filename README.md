PPI  Skeleton Application
=======================

What is PPI ?
--------------
PPI is a framework delivery engine. Using the concept of microservices, it lets you choose which parts of frameworks you wish to use on a per-feature basis. As such each feature makes its own independent decisions, allowing you to pick the best tools from the best PHP frameworks.

[Visit the documentation](http://docs.ppi.io/latest)

Contributing
------------

PPI is an open source, community-driven project. If you'd like to contribute, check out our issues list. You can find us
on IRC, Google Plus or Twitter ([@ppi_framework][@twitter]).

If you're submitting a pull request, please do so on your own branch on [GitHub][@gitweb].
 
Start by forking the PPI Skeletonapp repository and cloning your fork locally:

    $ git clone git@github.com:YOUR_USERNAME/skeletonapp.git
    $ git remote add upstream git://github.com/ppi/skeletonapp.git
    $ git checkout -b feature/BRANCH_NAME master

After your work is finished rebase the feature branch and push it:

    $ git checkout master
    $ git fetch upstream
    $ git merge upstream/master
    $ git checkout feature/BRANCH_NAME
    $ git rebase master
    $ git push --force origin feature/BRANCH_NAME

Go to GitHub again and make a pull request on the ppi/framework repository. Thank you for making PPI better!



