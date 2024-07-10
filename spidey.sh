#!/bin/bash
PROJECT_DIR="/www/wwwroot/myayasompo.ayasompo.com"
BRANCH="master"
USERNAME="ShineShineDev"
PASSWORD="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"
REPO_URL="https://$USERNAME:$PASSWORD@github.com/ShineShineDev/aya-sompo"
cd $PROJECT_DIR || { echo "Directory not found"; exit 1; }
git checkout $BRANCH
git fetch $REPO_URL
git reset --hard FETCH_HEAD
git checkout -- .env
echo "Hello Spidey, Deployment completed successfully."
