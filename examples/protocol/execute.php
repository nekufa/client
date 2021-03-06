<?php

/**
 * This file is part of the Tarantool Client package.
 *
 * (c) Eugene Leonovich <gen.work@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

require __DIR__.'/../bootstrap.php';

$client = create_client();
$client->executeUpdate('DROP TABLE IF EXISTS users');

$result1 = $client->executeUpdate('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT, email VARCHAR(255))');
$result2 = $client->executeUpdate('INSERT INTO users VALUES (null, :email)', [':email' => 'foobar@example.com']);
$result3 = $client->executeQuery('SELECT * FROM users WHERE email = ?', 'foobar@example.com');

printf("Result 1: %s\n", json_encode([$result1->count(), $result1->getAutoincrementIds()]));
printf("Result 2: %s\n", json_encode([$result2->count(), $result2->getAutoincrementIds()]));
printf("Result 3: %s\n", json_encode(iterator_to_array($result3)));

/* OUTPUT
Result 1: [1,null]
Result 2: [1,[1]]
Result 3: [{"ID":1,"EMAIL":"foobar@example.com"}]
*/
