#!/bin/bash

sed '1d' cities_table.txt | awk "{print \$3}" | uniq -c | sort -r | head -n 3