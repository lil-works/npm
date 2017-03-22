#!/bin/bash


if [ $1 ]
then
find vendor/ -type d -name .git -exec rm -rf {} \;
find vendor/ -name .gitignore -exec rm {} \;
git rm -r --cached vendor
git add .
git status
git commit -m "commit $1"
git push

fi