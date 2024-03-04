#!/bin/bash

if [ $# -ne 2 ]; then
  echo "Error: 2 parameters must be passed"
  exit 1
fi

#Вариант 1
#result=$(python -c "print($val1 + $val2)")
#echo "Результат: $result"

#Вариант 2
result=$(echo "$1 $2" | awk '{print $1 + $2}')
echo "Результат: $result"