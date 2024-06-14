#!/bin/bash

PROJECT_DIR="/www/wwwroot/myayasompo.ayasompo.com"
BRANCH="master"
USERNAME="ShineShineDev"
PASSWORD="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"
REPO_URL="https://$USERNAME:$PASSWORD@github.com/ShineShineDev/aya-sompo"

cd $PROJECT_DIR || { echo "Directory not found"; exit 1; }

# Ensure we are on the correct branch
git checkout $BRANCH

# Fetch the latest changes from the remote repository using the embedded username and password
git fetch $REPO_URL

# Reset the local branch to the fetched changes
git reset --hard FETCH_HEAD

# Restart your application (adjust this command to your needs)
# Example for a Node.js application using PM2
# pm2 restart all

echo "Hello Spidey, Deployment completed successfully."
