<?php

return [
    [
        5,
        [3, 4, 5, 2, 3, 4, 5, 6, 4, 7],
        3,
    ],
    [
        4,
        [3, 4, 5, 2, 3, 4, 5, 6, 4, 7],
        7,
    ],
    [
        2,
        [3, 4, '5', 2, 3, 4, '5', '6', 4, '7'],
        6,
    ],
    [
        '#VALUE!',
        [3, 4, 5, 2, 3, 4, 5, 6, 4, 7],
        'NAN',
    ],
    [
        '#NUM!',
        [3, 4, 5, 2, 3, 4, 5, 6, 4, 7],
        -1,
    ],
    [
        '#NUM!',
        [],
        1,
    ],
];
