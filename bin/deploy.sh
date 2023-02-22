#!/bin/bash

#   Defaults
AUTHOR=tertek
CONTAINER=pdftk-web-service

#   Check if TAG_NAME has been defined, use default if not
if [ -z "$1" ]
then
    TAG_NAME="${AUTHOR}/${CONTAINER}"
else
    TAG_NAME="$1"
fi

#   Check if VERSION has been defined, use default if not
if [ -z "$2" ]
then
    VER="latest"
else
    VER="$2"
fi

IMAGE_NAME="${TAG_NAME}:${VER}"

#   Docker Build
docker build -t "${IMAGE_NAME}" .

#   Docker Run
docker run -d --name $CONTAINER -p 80:80 $TAG_NAME