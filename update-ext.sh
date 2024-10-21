#!/bin/bash
DIR=$(dirname -- "$0")
pushd $DIR
bash ../../files/civicrm/ext/update-ext.sh
bash ext/update-ext.sh
popd



