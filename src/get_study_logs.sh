#!/bin/bash
rm /tmp/states.csv
rm /tmp/actions.csv
php get_study_logs.php
cp /tmp/states.csv states.csv
cp /tmp/actions.csv actions.csv

