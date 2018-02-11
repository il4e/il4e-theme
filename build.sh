#!/bin/bash
docker build . -t yarn

docker run --rm --entrypoint cat yarn:latest /tmp/yarn.lock > /tmp/yarn.lock
if ! diff -q yarn.lock /tmp/yarn.lock > /dev/null  2>&1; then
  echo "We have a new yarn.lock"
  cp /tmp/yarn.lock yarn.lock
fi
