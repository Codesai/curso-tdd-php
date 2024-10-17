<?php

namespace Codesai\TDD\TripService\trip;

use Codesai\TDD\TripService\user\User;
use Codesai\TDD\TripService\user\UserSession;

class TripService
{
    public function getTripsByUser(User $user): array
    {
        $tripList = [];
        $loggedUser = UserSession::getInstance()->getLoggedUser();
        $isFriend = false;

        if ($loggedUser !== null) {
            foreach ($user->getFriends() as $friend) {
                if ($friend->equals($loggedUser)) {
                    $isFriend = true;
                    break;
                }
            }

            if ($isFriend) {
                $tripList = TripDAO::findTripsByUser($user);
            }

            return $tripList;
        } else {
            throw new UserNotLoggedInException("User is not logged in.");
        }
    }
}