<?php

namespace App\Http\Controllers;

use Demindo\MulticraftApi\MulticraftApi;
use Response;

class JsonController extends Controller
{
	var $multicraft;

	public function __construct()
	{
		$this->multicraft = new MulticraftApi(config('multicraft.url'), config('multicraft.user'), config('multicraft.key'));
	}

	public function getInfo($server_id)
	{

		var_dump($this->multicraft->call("getServer", ['id' => $server_id]));
		exit();

		$infos = $this->multicraft->call("getServer", ['id' => $server_id])['data']['Server'];
		$status = $this->multicraft->call("getServerStatus", ['id' => $server_id])['data'];

		$server['id'] = $server_id;
		$server['name'] = $infos['name'];
		$server['status'] = $status['status'];
		$server['online'] = $status['onlinePlayers'];
		$server['max'] = $infos['players'];
		$server['port'] = $infos['port'];
		$server['ip'] = $infos['ip'];
		$server['memory'] = $infos['memory'];
		$server['suspended'] = $infos['suspended'];

		return Response::json($server);
	}

	public function getStatus($server_id)
	{
		$status = $this->multicraft->call("getServerStatus", ['id' => $server_id])['data'];

		$server['status'] = $status['status'];
		$server['online'] = $status['onlinePlayers'];

		return Response::json($server);
	}

	public function getConsole($server_id)
	{
		$status = $this->multicraft->call("getServerLog", ['id' => $server_id])['data'];

		$server['id'] = $server_id;

		foreach ($status as $k => $v) {
			$server['lines'][] = utf8_encode ($v['line']);
		}

		return Response::json($server);
	}

	public function getPlayersCount($server_id)
	{
		$time = time() * 1000;
		$players = (int)$this->multicraft->call("getServerStatus", ['id' => $server_id])['data']['onlinePlayers'];

		return Response::json(array($time, $players));
	}

	public function getPlayers($server_id)
	{
		$response = $this->multicraft->call("getServerStatus", ['id' => $server_id, "player_list" => true]);

		$players = array();

		foreach($response['data']['players'] as $player)
		{
			$players[] = $player['name'];
		}

		return Response::json($players);
	}

	public function getResources($server_id)
	{
		$infos = $this->multicraft->call("getServerResources", ['id' => $server_id])['data'];

		return Response::json($infos);
	}

	public function getHistoryMemory($server_id)
	{
		$ret = array();
		for ($i = 0; $i < 25; $i++) {
			$ret[$i] = rand(0, 100);
		}

		return Response::json($ret);
	}

	public function getHistoryProcessor($server_id)
	{
		$ret = array();
		for ($i = 0; $i < 25; $i++) {
			$ret[$i] = rand(0, 100);
		}

		return Response::json($ret);
	}

	public function sendConsoleCommand($server_id, $command)
	{
		$response = $this->multicraft->call("sendConsoleCommand", ['server_id' => $server_id, "command" => $command]);

		return $response;
	}


	public function startServer($server_id)
	{
		$response = $this->multicraft->call("startServer", ['id' => $server_id]);

		return $response;
	}

	public function stopServer($server_id)
	{
		$response = $this->multicraft->call("stopServer", ['id' => $server_id]);

		return $response;
	}

	public function restartServer($server_id)
	{
		$response = $this->multicraft->call("restartServer", ['id' => $server_id]);

		return $response;
	}

	public function killServer($server_id)
	{
		$response = $this->multicraft->call("killServer", ['id' => $server_id]);

		return $response;
	}
}
