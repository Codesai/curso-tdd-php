<?php

namespace Codesai\TDD\TripService\trip;

use Codesai\TDD\TripService\user\User;
use PDO;
use PDOException;

class TripDAO
{
    private const DATABASE_NAME = 'trips';
    private const USER = 'phileas';
    private const PASS = '123456';

    public static function findTripsByUser(User $user): array
    {
        $trips = [];

        $dsn = "mysql:host=localhost;dbname=" . self::DATABASE_NAME;

        try {
            $connection = new PDO($dsn, self::USER, self::PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT id FROM trips WHERE `user` = :username";
            $statement = $connection->prepare($sql);
            $statement->bindValue(':username', $user->getName());
            $statement->execute();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $trips[] = new Trip($row['id']);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $trips;
    }
}