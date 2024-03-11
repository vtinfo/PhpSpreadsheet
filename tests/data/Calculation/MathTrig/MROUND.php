<?php

declare(strict_types=1);

return [
    [9, '10,3'],
    [-9, '-10,-3'],
    [1.4, '1.3,0.2'],
    [0, '5,0'],
    [3.142, '3.14159, 0.002'],
    [-3.140, '-3.14159,-0.02'],
    [31420, '"31415.92654", 10'],
    [31416, '31415.92654,"1"'],
    [0, '0,5'],
    ['#NUM!', '5,-2'],
    ['#VALUE!', '"ABC",1'],
    ['#VALUE!', '1.234, "ABC"'],
    [0, ', 2'],
    ['#VALUE!', 'false, 2'],
    ['#VALUE!', 'true, 2'],
    ['#VALUE!', '"", 2'],
    ['exception', ''],
    ['exception', '5'],
    [1, 'A2, 1'],
    [3, 'A3, 1'],
    [-4, 'A4, -1'],
    [-5, 'A5, -1'],
    [0, 'B1, 1'],
];
