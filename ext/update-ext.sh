#!/bin/bash
DIR=$(dirname -- "$0")
pushd $DIR
krsync --rsyncopts '\-rPavvz --exclude=".git" --exclude="update-ext.sh" --delete' --force $(kubectl --context=gke-shared get pod | awk '/weynwebworks-shared-hosting/ {print $1}'):/domains/civi.timelab.org/civisite/sites/default/files/civicrm/ext/ .
popd
