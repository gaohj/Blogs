#!/bin/bash

cd /data/www/blog/Blogs 

git checkout my 
git add .
git commit -a -m 'init'
git checkout develop 
git merge my 
git push origin develop 
git checkout my 
