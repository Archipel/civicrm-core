#!/bin/bash
krsync --rsyncopts '\-rPavvz --exclude="*/.git" --exclude=".git" --exclude="**/.git"' --force $(kubectl --context=gke-shared get pod | awk '/weynwebworks-shared-hosting/ {print $1}'):/domains/civi.timelab.org/civisite/sites/default/files/civicrm/ext/ .




