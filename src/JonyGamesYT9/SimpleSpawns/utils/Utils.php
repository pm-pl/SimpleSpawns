<?php

namespace JonyGamesYT9\SimpleSpawns\utils;

use JonyGamesYT9\SimpleSpawns\SimpleSpawns;
use pocketmine\world\Position;
use pocketmine\Player;
use pocketmine\Server;

/**
 * Class Utils 
 * @package JonyGamesYT9\SimpleSpawns\utils;
 */
class Utils 
{
  
  /**
   * @param Player $player
   * @return void 
   */
  public static function teleport(Player $player): void 
  {
    $provider = SimpleSpawns::getInstance()->getYamlProvider();
    if ($provider->getWorld() != null) {
      $teleport = new Position($provider->getCoordinates("x"), $provider->getCoordinates("y"), $provider->getCoordinates("z"), Server::getInstance()->getWorldByName($provider->getWorld()));
      $player->teleport($teleport);
      $player->sendMessage($provider->getMessage("teleport.hub.message"));
    } else {
      $player->sendMessage($provider->getMessage("teleport.error.message"));
    }
  }
}